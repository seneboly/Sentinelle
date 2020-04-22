<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    protected $guarded = [];

    public function reclamations(){

    	return $this->hasMany(Reclamation::class);
    }

    public static function insertData($data){

      $value= DB::table('clients')->where('code_client', $data['code_client'])->get();
      if($value->count() == 0){
         DB::table('clients')->insert($data);
      }
   }

   

}
