<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class AssignerReclamation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $reclamation;
    public $assignateur;

    public function __construct($assignateur, $reclamation)
    {
        $this->reclamation = $reclamation;
        $this->assignateur = $assignateur;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('maileclipse::templates.assigne_reclamation')
                    ->subject('Assignation de réclamation');
    }
}
