<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use App\Models\ServiceChargeReclamation;
use App\Models\StatusReclamations;
use App\Models\Client;

use App\User;

use Carbon\Carbon;


class Reclamation extends Model
{
    protected $guarded = [];

    public $casts = ['date_traitement'=>'date', 'date_reception_marche_iaao'=>'date', 'date_traitement_reclamation'=>'date', 'date_reclamation'=>'date','date_reception_sgbs'=>'date', 'created_at'=>'date', 'date_renseignement_reclamation'=>'date', 'date_clocture'=>'date', 'duree_traitement'=>'date'];



    protected $appends = ['duree_traitement', 'date_clocture_limite'];

    public function service_charge_reclamation(){

        return $this->belongsTo(ServiceChargeReclamation::class);
    }

    public function status_reclamation(){

        return $this->belongsTo(StatusReclamations::class);
    }

    
  


    public function client (){

        return $this->belongsTo(Client::class);
    }



    public function user(){

        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'code_reclamation';
    }

    public function ccl(){

        return $this->belongsToMany(User::class, 'ccl_reclamation', 'reclamation_id', 'ccl_id')
        ->withPivot('created_at')
        ->withTimestamps();
    }


    public function getDureeTraitementAttribute(){

        $start = $this->attributes['date_reception_sgbs'];
        $end = $this->attributes['date_clocture_reelle'];
        

        $value = Carbon::parse($start)->diffInDays($end, false); 

        return $value;
    }

    public function getDateCloctureLimiteAttribute(){

        $days = $this->attributes['date_reception_sgbs'];

        $start = Carbon::parse($days)->addDays(60);

        return $start;

    }

   

}
