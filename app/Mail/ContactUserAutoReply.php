<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUserAutoReply extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(ContactMessage $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('We received your message - Lawcription')
            ->replyTo(config('mail.support_address'), 'Lawcription Support')
            ->view('frontend.emails.contact-user-autoreply');
    }
}