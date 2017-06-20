<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{

    protected $table ="ouvrages";

    protected $fillable = [
                            'titre_propre'     ,
                            'tyope_carte'      ,
                            'echelle'          ,
                            'types_ouvrage_id'  ,
                            'pays'              ,
                            'mot_cle'              ,
                            'nature'            ,
                            'feuille'           ,
                            'subdivision'       ,
                            'lieuConservation',
                            'annee_edition'
                        ];

    public function scopeListeCarte($query)
    {
        return $query->where('types_ouvrage_id',3)->get();
    }

    public function exemplaires(){

        return $this->hasMany('App\exemplaire','ouvrage_id');
    }
}
