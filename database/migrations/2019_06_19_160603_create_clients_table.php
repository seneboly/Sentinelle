<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_client');
            $table->string('code_gestionnaire');
            $table->string('nom_client');
            $table->string('nom_gestionnaire_compte')->nullable();
            $table->string('numero_agence');
            $table->string('nom_agence'); 
            $table->string('devise');
            $table->string('numero_compte');
            $table->string('intitule');
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
        Schema::dropIfExists('clients');
    }
}
