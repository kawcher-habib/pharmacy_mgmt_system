<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailMessage;
    public $subject;
    public $rendomPassword;

    /**
     * Create a new message instance.
     */
    public function __construct($message, $subject)
    {
        //
        $this->emailMessage = $message;
        $this->subject = $subject;
        $this->rendomPassword = Str::password(12, symbols:true);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('kawcher578@gmall.com', 'Pharmacy Management System'),
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
       
        return new Content(
            view: 'email-template.forgotemail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
