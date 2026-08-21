<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApproveUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($user) { $this->user = $user; }

    public function build()
    {
        return $this->subject(config('app.name').' - Account Approved')
            ->from(config('mail.from.address', 'noreply@example.com'), config('mail.from.name', config('app.name', 'Laravel')))
            ->view('emails.approve-user')
            ->with(['user' => $this->user])
            ->with(['data' => $this->data]);
    }
}