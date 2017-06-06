<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeinKeyToOuvrages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ouvrages', function (Blueprint $table){
            $table->integer('types_ouvrage_id')->unsigned();
            $table->integer('rayon_id')->unsigned();
            $table->integer('collection_id')->unsigned();

            $table->foreign('types_ouvrage_id')->references('id')->on('types_ouvrages');
            $table->foreign('rayon_id')->references('id')->on('rayons');
            $table->foreign('collection_id')->references('id')->on('collections');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ouvrages', function (Blueprint $table) {
            //
        });
    }
}
