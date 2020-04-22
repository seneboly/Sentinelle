<?php

namespace App\Providers;

use App\Providers\RenseignedReclamation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Reclamation;
use Illuminate\Support\Facades\Mail;

class SendEmailReclamation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  RenseignedReclamation  $event
     * @return void
     */
    public function handle(RenseignedReclamation $reclamation)
    {
        Mail::to('boly.sene@socgen.com')->send($reclamation->reclamation);
    }
}
