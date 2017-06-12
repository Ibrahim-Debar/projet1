<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToOuvrage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ouvrages', function (Blueprint $table) {
              $table->string('pays')->nullable();
              $table->string('nature')->nullable();
              $table->string('feuille')->nullable();
              $table->string('categorie')->nullable();
              $table->string('subdivision')->nullable();
              $table->string('lieuConservation')->nullable();
              $table->integer('annee_edition')->change();
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
