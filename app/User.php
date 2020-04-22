<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role;
use App\Models\Reclamation;

use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){

        return $this->belongsToMany(Role::class);
    }

    public function reclamations(){

        return $this->hasMany(Reclamation::class);
    }

     public static function insertData($data){

       $value= DB::table('users')->where('name', $data['name'])->get();
       if($value->count() == 0){
          DB::table('users')->insert($data);
       }
    }

    
    public function reclamation(){

        return $this->belongsToMany(Reclamation::class, 'ccl_reclamation', 'ccl_id', 'reclamation_id')
        ->withPivot('created_at')
        ->withTimestamps();
    }
}
