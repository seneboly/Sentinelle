<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\ServiceChargeReclamation;
use Faker\Generator as Faker;

$factory->define(ServiceChargeReclamation::class, function (Faker $faker) {
    return [
        		'nom_service'=>$faker->company
    ];
});
