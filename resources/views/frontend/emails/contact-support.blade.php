<h2>New message from Lawcription contact form</h2>
<table cellpadding="6">
    <tr><td><strong>Name</strong></td><td>{{ $contact->name }}</td></tr>
    <tr><td><strong>Phone</strong></td><td>{{ $contact->phone ?? '-' }}</td></tr>
    <tr><td><strong>Email</strong></td><td>{{ $contact->email }}</td></tr>
    <tr><td><strong>Subject</strong></td><td>{{ $contact->subject }}</td></tr>
    <tr><td><strong>Message</strong></td><td>{!! nl2br(e($contact->message)) !!}</td></tr>
    <tr><td><strong>Received</strong></td><td>{{ $contact->created_at->format('d M Y, h:i A') }}</td></tr>
</table>