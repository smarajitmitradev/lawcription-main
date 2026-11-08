<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We received your message</title>
</head>
<body style="margin:0; padding:0; background-color:#f1f5f9; font-family:Arial, Helvetica, sans-serif;">

    {{-- Hidden preview text shown in inbox list --}}
    <div style="display:none; max-height:0; overflow:hidden; opacity:0; color:#f1f5f9;">
        Thanks for reaching out, {{ $contact->name }}. We have received your message and will reply shortly.
    </div>

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f1f5f9">
        <tr>
            <td align="center" style="padding:32px 16px;">

                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0"
                       style="width:100%; max-width:600px; background-color:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 4px 24px rgba(15,23,42,0.08);">

                    {{-- HEADER --}}
                    <tr>
                        <td align="center" bgcolor="#0d0f14" style="background-color:#0d0f14; padding:40px 32px 32px;">
                            <div style="font-family:Georgia, 'Times New Roman', serif; font-size:28px; font-weight:bold; color:#ffffff; letter-spacing:0.5px;">
                                Lawcription<span style="font-size:14px; vertical-align:super;">&trade;</span>
                            </div>
                            <div style="margin-top:6px; font-size:11px; letter-spacing:3px; text-transform:uppercase; color:#22d3ee;">
                                Medico-Legal Knowledge Platform
                            </div>
                        </td>
                    </tr>

                    {{-- ACCENT BAR --}}
                    <tr>
                        <td height="4" style="height:4px; line-height:4px; font-size:0; background-color:#22d3ee;">&nbsp;</td>
                    </tr>

                    {{-- CHECK ICON + HEADING --}}
                    <tr>
                        <td align="center" style="padding:40px 32px 8px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center" width="64" height="64" bgcolor="#ecfeff"
                                        style="width:64px; height:64px; border-radius:32px; background-color:#ecfeff; font-size:30px; line-height:64px; color:#0891b2; font-weight:bold;">
                                        &#10003;
                                    </td>
                                </tr>
                            </table>
                            <h1 style="margin:20px 0 8px; font-size:24px; line-height:1.3; color:#0f172a; font-weight:bold;">
                                We&rsquo;ve received your message
                            </h1>
                            <p style="margin:0; font-size:15px; line-height:1.6; color:#64748b;">
                                Hello <strong style="color:#0f172a;">{{ $contact->name }}</strong>, thank you for contacting Lawcription&trade;.
                                Our team will review your message and get back to you shortly.
                            </p>
                        </td>
                    </tr>

                    {{-- MESSAGE SUMMARY CARD --}}
                    <tr>
                        <td style="padding:28px 32px 8px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                                   style="background-color:#f8fafc; border:1px solid #e2e8f0; border-radius:12px;">
                                <tr>
                                    <td style="padding:20px 22px;">
                                        <div style="font-size:11px; letter-spacing:2px; text-transform:uppercase; color:#94a3b8; font-weight:bold;">
                                            Your message
                                        </div>
                                        <div style="margin-top:10px; font-size:16px; font-weight:bold; color:#0f172a;">
                                            {{ $contact->subject }}
                                        </div>
                                        <div style="margin-top:8px; font-size:14px; line-height:1.7; color:#475569;">
                                            {!! nl2br(e($contact->message)) !!}
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- INFO ROW: HOURS + RESPONSE TIME --}}
                    <tr>
                        <td style="padding:16px 32px 8px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="50%" valign="top" style="padding-right:8px;">
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                                               style="background-color:#faf5ff; border-radius:12px;">
                                            <tr>
                                                <td style="padding:16px 18px;">
                                                    <div style="font-size:11px; letter-spacing:1.5px; text-transform:uppercase; color:#9333ea; font-weight:bold;">Business Hours</div>
                                                    <div style="margin-top:6px; font-size:13px; line-height:1.5; color:#334155;">
                                                        Monday &ndash; Saturday<br>9:00 AM &ndash; 6:00 PM
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="50%" valign="top" style="padding-left:8px;">
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                                               style="background-color:#ecfeff; border-radius:12px;">
                                            <tr>
                                                <td style="padding:16px 18px;">
                                                    <div style="font-size:11px; letter-spacing:1.5px; text-transform:uppercase; color:#0891b2; font-weight:bold;">Response Time</div>
                                                    <div style="margin-top:6px; font-size:13px; line-height:1.5; color:#334155;">
                                                        Usually within<br>1&ndash;2 working days
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- BUTTON --}}
                    <tr>
                        <td align="center" style="padding:28px 32px 8px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center" bgcolor="#0d0f14" style="border-radius:10px; background-color:#0d0f14;">
                                        <a href="https://lawcription.in"
                                           style="display:inline-block; padding:14px 32px; font-size:14px; font-weight:bold; color:#ffffff; text-decoration:none; border-radius:10px;">
                                            Visit Lawcription &rarr;
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- SIGN-OFF --}}
                    <tr>
                        <td style="padding:28px 32px 36px;">
                            <p style="margin:0; font-size:14px; line-height:1.7; color:#475569;">
                                Warm regards,<br>
                                <strong style="color:#0f172a;">Team Lawcription&trade;</strong>
                            </p>
                        </td>
                    </tr>

                    {{-- FOOTER --}}
                    <tr>
                        <td align="center" bgcolor="#f8fafc" style="background-color:#f8fafc; border-top:1px solid #e2e8f0; padding:22px 32px;">
                            <p style="margin:0 0 6px; font-size:12px; color:#64748b;">
                                Need help? Write to
                                <a href="mailto:support@lawcription.in" style="color:#0891b2; text-decoration:none; font-weight:bold;">support@lawcription.in</a>
                            </p>
                            <p style="margin:0; font-size:11px; color:#94a3b8; line-height:1.6;">
                                You received this email because you submitted the contact form at lawcription.in.<br>
                                &copy; {{ date('Y') }} Lawcription&trade;. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>