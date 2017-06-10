<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{

    protected $table ="ouvrages";

    protected $fillable = ['titre_propre','tyope_carte','echelle','types_ouvrage_id'];

    public function scopeListeCarte($query)
    {
        return $query->where('types_ouvrage_id',3)->get();
    }


}
