<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepositAlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($deposit) { $this->deposit = $deposit; }

    public function build()
    {
        return $this->subject(config('app.name').' - Deposit Alert')
            ->from(config('mail.from.address', 'noreply@example.com'), config('mail.from.name', config('app.name', 'Laravel')))
            ->view('emails.deposit-alert')
            ->with(['deposit' => $this->deposit])
            ->with(['data' => $this->data]);
    }
}