<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageText;
    public $code;

    /**
     * Create a new message instance.
     */
    public function __construct($messageText , $code)
    {
        $this->code = $code;
        $this->messageText = $messageText;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('toamasina-link@gmail.com', 'Toamasina-link'),
            replyTo: [
                new Address('chamsedinemaulicemourad@gmail.com', 'mourad'),
            ],
            subject: 'Code de vérification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.test',
        );
    }
    //    public function build()
    // {
    //     return $this->subject('Test d’email Laravel')
    //                 ->view('emails.test');
    // }

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
