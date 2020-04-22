<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Reclamation;

class StatusReclamations extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function reclamations(){

    	return $this->hasMany(Reclamation::class);
    }
}
