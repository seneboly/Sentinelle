<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignerReclamationToCcl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccl_reclamation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('reclamation_id')->unsigned();
            $table->foreign('reclamation_id')
            ->references('id')
            ->on('reclamations')
            ->onDelete('cascade');

            $table->bigInteger('ccl_id')->unsigned();
            $table->foreign('ccl_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
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
        Schema::dropIfExists('ccl_reclamation');
    }
}
