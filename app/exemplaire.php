<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exemplaire extends Model
{

    protected $fillable = ['type_achat','prix','ouvrage_id','n_ordre'];

    public function livre(){

          return $this->belongsTo('App\livre','ouvrage_id');

    }




}
