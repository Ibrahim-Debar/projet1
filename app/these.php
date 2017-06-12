<?php

namespace App;
use App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class these extends Model
{

    protected $table ="ouvrages";

    protected $fillable = [
        'titre_propre'     ,
        'edition'      ,
        'date_soutenue'          ,
        'these_genre',
        'types_ouvrage_id',

    ];

    public function scopeListeThese($query)
    {
        return $query->where('types_ouvrage_id',2)->get();
    }


    public function Auteurs(){

        return $this->hasMany('App\Auteur','ouvrage_id');
    }
}
