<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_reclamation')->unique();
            $table->text('motif_reclamation');
            $table->text('justification_traitement');
            $table->string('canal_reception');
            $table->string('provenance_reclamation');

           $table->text('caractere_traitement')->nullable();


            $table->boolean('reponse_partielle')->default(false);
            
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');

            $table->bigInteger('service_charge_reclamation_id')->unsigned();
            $table->foreign('service_charge_reclamation_id')->references('id')
            ->on('service_charge_reclamations')->onDelete('cascade');

            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')
            ->on('clients')->onDelete('cascade');

            $table->bigInteger('status_reclamation_id')->unsigned();
            $table->foreign('status_reclamation_id')->references('id')
            ->on('status_reclamations')->onDelete('cascade');


            $table->date('date_reception_sgbs');
            $table->date('date_reception_marche_iaao');
            $table->date('date_renseignement_reclamation');


            $table->date('date_traitement_reclamation')->nullable();
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reclamations');
    }
}
