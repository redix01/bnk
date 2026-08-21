<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AcceptLoanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($loan) { $this->loan = $loan; }

    public function build()
    {
        return $this->subject(config('app.name').' - Loan Approved')
            ->from(config('mail.from.address', 'noreply@example.com'), config('mail.from.name', config('app.name', 'Laravel')))
            ->view('emails.accept-loan')
            ->with(['loan' => $this->loan])
            ->with(['data' => $this->data]);
    }
}