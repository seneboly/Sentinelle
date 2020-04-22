<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\StatusReclamations;
use Faker\Generator as Faker;

$factory->define(StatusReclamations::class, function (Faker $faker) {
    return [
        
        	'status'=>$faker->safeColorName
    ];
});
