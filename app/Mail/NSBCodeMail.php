<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NSBCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($data) { $this->data = $data; }

    public function build()
    {
        return $this->subject(config('app.name').' - NSB Code')
            ->from(config('mail.from.address', 'noreply@example.com'), config('mail.from.name', config('app.name', 'Laravel')))
            ->view('emails.nsb-code')
            ->with(['data' => $this->data])
            ->with(['data' => $this->data]);
    }
}