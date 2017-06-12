<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{

    protected $fillable = [
        'nom',
        'ouvrage_id'

    ];



    public function theses(){

        return $this->belongsTo('App\these');
    }


}
