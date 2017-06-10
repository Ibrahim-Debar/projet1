<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOuvragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ouvrages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('isbn')->nullable();
            $table->text('titre_propre')->nullable();
            $table->text('complement_titre')->nullable();
            $table->text('edition')->nullable();
            $table->date('annee_edition')->nullable();
            $table->float('prix')->nullable();
            $table->text('resume')->nullable();
            $table->string('mot_cle')->nullable();
            $table->string('langue')->nullable();
            $table->date('date_soutenue')->nullable();
            $table->integer('issn')->nullable();
            $table->integer('volume')->nullable();
            $table->integer('nsupplement')->nullable();
            $table->integer('pagination')->nullable();
            $table->string('tyope_carte')->nullable();
            $table->string('these_genre')->nullable();
            $table->string('echelle')->nullable();
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
        Schema::dropIfExists('ouvrages');
    }
}
