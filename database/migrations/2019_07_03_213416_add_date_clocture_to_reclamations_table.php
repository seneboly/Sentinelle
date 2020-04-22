<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateCloctureToReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reclamations', function (Blueprint $table) {
            
            $table->date('date_clocture_reelle')->nullable()->after('date_reception_sgbs');
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
            
            $table->dropColumn('date_clocture_reelle');
        });
    }
}
