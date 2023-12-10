<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $productsInfo;
    public $totalAmount;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order, $productsInfo, $totalAmount)
    {
        $this->order = $order;
        $this->productsInfo = $productsInfo;
        $this->totalAmount = $totalAmount;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('team404.theshoecompany@gmail.com', 'The Shoe Company'),
            subject: 'The Shoe Company - Order Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.order-placed',
            with: [
                'order' => $this->order,
                'productsInfo' => $this->productsInfo,
                'totalAmount' => $this->totalAmount
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
