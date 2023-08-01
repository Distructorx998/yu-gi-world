<?php
/*
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table= 'users' ;
    protected $primaryKey= 'id';
    public $timestamp=false;
}

*/
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Users extends Authenticatable
{
    protected $table= 'users';
    protected $primaryKey= 'id';
    public $timestamps=false;

    public function elenco(){
        return $this->hasMany("App/Models/Elenco", "user");
    }
    
    public function deck(){
        return $this->hasMany("App/Models/Deck", "user");
    }
}
