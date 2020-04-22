<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use App\Models\Reclamation;

use Illuminate\Support\Facades\Mail;
use App\Mail\Rappel;

use App\User;

class AssigneReclamation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rappel:reclamation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command send email to every assigned reclamation which should be solved';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $current = Carbon::now();
      

      $three_days = $current->subDays(2);

      

      $reclamations  = User::leftJoin('ccl_reclamation', 'ccl_reclamation.ccl_id', '=', 'users.id')
      ->leftJoin('reclamations', 'ccl_reclamation.reclamation_id', '=', 'reclamations.id')

      ->select('users.id','users.name', 'users.email', 'reclamations.code_reclamation', 'reclamations.email_renseigneur', 'ccl_reclamation.created_at','reclamations.status_reclamation_id')
      ->where('ccl_reclamation.created_at', '<',  $three_days)
      ->where('reclamations.status_reclamation_id', '!=', 1)
      
      // ->orderBy('reclamations.created_at', 'desc')
      ->groupBy('users.id','users.name', 'users.email', 'reclamations.code_reclamation', 'reclamations.email_renseigneur', 'ccl_reclamation.created_at', 'reclamations.status_reclamation_id')
      ->get();




      foreach ($reclamations as $reclamation) {


        
        Mail::to($reclamation->email)->send(new Rappel($reclamation)) ;
       
      }

        
            
            
        

       
    }


}
