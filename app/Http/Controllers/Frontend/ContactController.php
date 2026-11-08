<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactSupportMail;
use App\Mail\ContactUserAutoReply;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot: bots fill this hidden field, humans don't
        if ($request->filled('hp_field_x')) {
            Log::warning('Contact honeypot triggered from IP ' . $request->ip());
            return response()->json(['success' => true, 'message' => 'Thank you!']);
        }

        $data = $request->validate([
            'name'    => 'required|string|max:100',
            'phone'   => 'nullable|string|max:20',
            'email'   => 'required|email|max:150',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        $contact = ContactMessage::create($data + [
            'ip_address' => $request->ip(),
        ]);

        Log::info('Contact: saved id ' . $contact->id . ', sending to ' . config('mail.support_address'));

        // 1. Notify support
        try {
            Mail::to(config('mail.support_address'))
                ->send(new ContactSupportMail($contact));
            Log::info('Contact: support mail sent for id ' . $contact->id);
        } catch (\Throwable $e) {
            Log::error('Contact support mail failed: ' . $e->getMessage());
        }

        // 2. Auto-reply to the visitor (separate try/catch so one failure doesn't block the other)
        try {
            Mail::to($contact->email)
                ->send(new ContactUserAutoReply($contact));
            Log::info('Contact: auto-reply sent for id ' . $contact->id);
        } catch (\Throwable $e) {
            Log::error('Contact auto-reply failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Thank you! Your message has been sent. We will get back to you shortly.',
        ]);
    }
}
