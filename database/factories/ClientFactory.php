<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        	
    	'code_client'=>$faker->postcode,
    	'code_gestionnaire'=>$faker->postcode,
    	'nom_agence'=>$faker->name,
    	'devise'=>'0000',
    	'numero_compte'=>$faker->postcode,
    	'numero_agence'=>$faker->postcode,
    	'nom_client'=>$faker->firstName,
    	'nom_gestionnaire_compte'=>$faker->firstName,
    ];
});
