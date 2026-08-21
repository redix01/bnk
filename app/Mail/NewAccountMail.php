<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAccountMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($data) { $this->data = $data; }

    public function build()
    {
        return $this->subject(config('app.name').' - Account Created')
            ->from(config('mail.from.address', 'noreply@example.com'), config('mail.from.name', config('app.name', 'Laravel')))
            ->view('emails.new-account')
            ->with(['data' => $this->data])
            ->with(['data' => $this->data]);
    }
}