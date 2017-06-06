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
            $table->integer('isbn');
            $table->string('titre_propre');
            $table->string('complement_titre');
            $table->string('editeur');
            $table->date('annee_edition');
            $table->float('prix');
            $table->text('resume');
            $table->string('mot_cle');
            $table->string('langue');
            $table->date('date_soutenue');
            $table->integer('issn');
            $table->integer('volume');
            $table->integer('nsupplement');
            $table->integer('pagination');
            $table->string('tyope_carte');
            $table->float('echelle');
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
