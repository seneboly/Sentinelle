<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InformationReclamation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $reclamation;
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
        return $this->markdown('maileclipse::templates.reclamationrenseignee')
        ->subject('Réception d\'une nouvelle réclamation');
    }
}
