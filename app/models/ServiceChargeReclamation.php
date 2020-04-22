<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Reclamation;
use Illuminate\Support\Facades\DB;

class ServiceChargeReclamation extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public $table = 'service_charge_reclamations';

    public function reclamations(){

    	return $this->hasMany(Reclamation::class);
    }

      public static function insertData($data){

      $value= DB::table('service_charge_reclamations')->where('nom_service', $data['nom_service'])->get();
      if($value->count() == 0){
         DB::table('service_charge_reclamations')->insert($data);
      }
   }
}
