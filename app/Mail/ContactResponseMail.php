<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $problemDetails;
    public $adminMessage;

    /**
     * Create a new message instance.
     */
    public function __construct($problemDetails, $adminMessage)
    {
        $this->problemDetails = $problemDetails;
        $this->adminMessage = $adminMessage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('team404.theshoecompany@gmail.com', 'The Shoe Company'),
            subject: 'The Shoe Company - Contact Response Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.contact-response',
            with: [
                'problemDetails' => $this->problemDetails,
                'adminMessage' => $this->adminMessage
            ],
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
