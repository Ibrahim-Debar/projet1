<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class livre extends Model
{

    protected $table ="ouvrages";

    protected $fillable = [
        'titre_propre'     ,
        'edition'      ,
        'date_soutenue'          ,
        'annee_edition',
        'prix',
        'isbn',
        'langue',
        'mot_cle',
        'resume',
        'types_ouvrage_id',

    ];

    public function scopeListelivre($query)
    {
        return $query->where('types_ouvrage_id',1)->get();
    }


    public function Auteurs(){

        return $this->hasMany('App\Auteur','ouvrage_id');
    }
    public function exemplaires(){

        return $this->hasMany('App\exemplaire','ouvrage_id');
    }


}
