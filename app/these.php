<?php

namespace App;
use App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class these extends Model
{

    protected $table ="ouvrages";

    protected $fillable = [
        'titre_propre'     ,
        'date_soutenue'          ,
        'these_genre',
        'types_ouvrage_id',
        'langue',
        'mot_cle',
        'resume',

    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'date_soutenue'
    ];

    public function scopeListeThese($query)
    {
        return $query->where('types_ouvrage_id',2)->get();
    }

    public function getDateSoutenueAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }



    public function setDateSoutenueAttribute($value) {
        $format = 'd-m-Y';
        $this->attributes['date_soutenue'] = Carbon::createFromFormat($format, $value);
    }



    public function Auteurs(){

        return $this->hasMany('App\Auteur','ouvrage_id');
    }
    public function exemplaires(){

        return $this->hasMany('App\exemplaire','ouvrage_id');
    }
}
