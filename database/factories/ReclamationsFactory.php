<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Reclamation;
use Faker\Generator as Faker;

$factory->define(Reclamation::class, function (Faker $faker) {
    return [
        	
        	'user_id'=>random_int(1,7),
            'code_reclamation'=>'Rec-'.date('d').'-'.date('m').'-'.date('Y').'-'.rand(1,99999),
        	'service_charge_reclamation_id'=>random_int(11,27),
        	'client_id'=>random_int(1,1048),
        	'status_reclamation_id'=>random_int(1,3),
            'agent_traitant_reclamation_id'=>random_int(1,8),

            'reponse_partielle'=>$faker->boolean,
            // 'email_renseigneur'=>$faker->safeEmail,
        	'motif_reclamation'=>$faker->paragraph,
        	'justification_traitement'=>$faker->paragraph,
        	'canal_reception'=>$faker->sentence,
            'provenance_reclamation'=>$faker->sentence,
        	'date_reception_sgbs'=>$faker->dateTime,
        	'date_reception_marche_iaao'=>$faker->dateTime,
        	'date_renseignement_reclamation'=>$faker->dateTime,
        	


    ];
});
