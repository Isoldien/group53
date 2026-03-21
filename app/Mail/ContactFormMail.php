<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

/**
 * Mailable class for sending contact form submissions to site administrators.
 */
class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance with the submitted contact form data.
     * 
     * @param array $data Contains form input fields like subject, email, message, etc.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope, setting the subject line using the form's subject.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'YouZoo has received your message!: ' . $this->data['subject'],
        );
    }

    /**
     * Get the message content definition, linking it to the confirmation email blade template.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_confirmation',
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
