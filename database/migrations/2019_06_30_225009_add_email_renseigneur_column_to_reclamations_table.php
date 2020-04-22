<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailRenseigneurColumnToReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reclamations', function (Blueprint $table) {
            
            $table->string('email_renseigneur')->after("provenance_reclamation");
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reclamations', function (Blueprint $table) {
            
            $table->dropColumn(['email_renseigneur', 'date_reclamation']);
        });
    }
}
