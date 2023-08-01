<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $table= 'deck' ;
    protected $primaryKey= 'id';
    public $timestamps=false;
    protected $autoIncrement= false;

    public function  users(){
        return $this->belongsTo("App/Models/Users");
    }
}


