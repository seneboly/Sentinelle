<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Role extends Model
{
    protected $fillable = ['nom_role'];
    
    public $timestamps = false;

    public function users(){

    	return $this->belongsToMany(User::class);
    }
}
