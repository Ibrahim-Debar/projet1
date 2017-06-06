<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeinKeyToEmprunts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emprunts', function (Blueprint $table) {
            $table->integer('enseignant_id')->unsigned();
            $table->integer('exemplaire_id')->unsigned();


            $table->foreign('enseignant_id')->references('id')->on('enseignants');
            $table->foreign('exemplaire_id')->references('id')->on('exemplaires');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emprunts', function (Blueprint $table) {
            //
        });
    }
}
