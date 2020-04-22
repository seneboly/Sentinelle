<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Rappel extends Mailable
{
    use Queueable, SerializesModels;

    public $reclamation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reclamation)
    {
        $this->reclamation = $reclamation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.rappel')->subject('Rappel de traitement de reclamation')->cc('boly.sene@socgen.com');
    }
}
