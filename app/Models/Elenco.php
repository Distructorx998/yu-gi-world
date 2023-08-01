<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elenco extends Model
{
    protected $table= 'elenco' ;
    protected $primaryKey= 'id';

    
    public $timestamps=false;

    public function  users(){
        return $this->belongsTo("App/Models/Users");
    }
}


