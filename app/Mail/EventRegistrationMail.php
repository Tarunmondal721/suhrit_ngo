<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Event;

class EventRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Event $event, $name)
    {
        $this->event = $event;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Event Registration Confirmation')
                    ->view('emails.event-registration');
    }
}
