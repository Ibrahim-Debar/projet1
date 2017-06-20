<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emprunt extends Model
{
    protected $fillable =[
        'enseignant_id',
        'exemplaire_id',
        'demande',
        'deai',
        'date_debut',
        'date_fin'
    ];

    public function exemplaire(){

        return $this->belongsTo('App\exemplaire','exemplaire_id');
    }
    public function enseignant(){

        return $this->belongsTo('App\enseignant','enseignant_id');
    }

    public function getDates(){

        return ['date_debut','date_fin'];

    }

}
