<?php

namespace App\Mail;

use App\Models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonationReceipt extends Mailable
{
    use Queueable, SerializesModels;

    public $donation;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    public function build()
    {
        return $this->subject('Thank You for Your Donation')
                    ->view('emails.donation_receipt')
                    ->with('donation', $this->donation);
    }
}

