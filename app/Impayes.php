<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Impayes extends Model
{
    public $table = 'impayes';
    public $guarded = [];

     public static function insertData($data){
         
      return DB::table('impayes')->insert($data);
      
    }
}
