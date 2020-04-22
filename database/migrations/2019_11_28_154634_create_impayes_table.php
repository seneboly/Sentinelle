<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpayesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impayes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('agence')->nullable();
            $table->string('numero_client')->nullable();
            $table->string('prenom_client')->nullable();
            $table->string('nom')->nullable();
            $table->string('raison_sociale')->nullable();
            $table->string('code_pcb')->nullable();
            $table->string('numero_compte')->nullable();
            $table->string('chapitre')->nullable();
            $table->string('chapitre_1_3')->nullable();
            $table->string('qualite_client')->nullable();
            $table->string('code_ges')->nullable();
            $table->string('nom_ges')->nullable();
            $table->string('segment_bhfm')->nullable();
            $table->string('sde_a_jour')->nullable();
            $table->date('premier_impaye')->nullable();
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
        Schema::dropIfExists('impayes');
    }
}
