<?php

namespace App\Mail;

use App\Models\Pelaporan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateLaporan extends Mailable
{
    use Queueable, SerializesModels;

    protected $pelaporan;

    /**
     * Create a new message instance.
     */
    public function __construct(Pelaporan $pelaporan)
    {
        $this->pelaporan = $pelaporan;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Update Laporan',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'dashboard.email.index',
            with: [
                'pelaporan' => $this->pelaporan,
            ]
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