<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMessages extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $guest_message = "";
    public function __construct($guest_message_from_controller)
    {
        $this->guest_message = $guest_message_from_controller;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $guest_message_final = $this->guest_message;
        return $this->view('mail.sendmessage', compact('guest_message_final'));
    }
}
