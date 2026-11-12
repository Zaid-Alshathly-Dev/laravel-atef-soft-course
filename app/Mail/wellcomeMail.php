<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Headers;
use League\CommonMark\Reference\Reference;

class wellcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data ;
    public function __construct($data)
    {
        $this->data = $data;    
    }

    public function headers(): Headers
    {
        return new Headers(
    messageId : 'zaid20576520@gmail.com',
    references : ['zaid alshathly'],
    text : [
    'X-Custom-header'=> 'hi'
    ]

    
        );}


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Wellcome Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.wellcome',
            with: ['info' => $this->data]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [
            attachment::fromPath(public_path('zaid.pdf'))
                ->as('zaid.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
