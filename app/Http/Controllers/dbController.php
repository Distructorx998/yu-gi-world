<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Request;
use Session;

class dbController extends Controller
{
    public function register ( ){
        if(Session::has('user_id')){
            return redirect('hw');
        }

    if (!empty( Request::post ("username")) && !empty(Request::post("password")) && !empty(Request::post("email")) && !empty(Request::post("name")) && !empty(Request::post('surname')) && !empty(Request::post("confirm_password")) && !empty(Request::post("allow")))
    {
        
        $error = array();

        
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', Request::post('username'))) {
            $error['username'] = "Username non valido";
        } else {
            if(Users::where('username', Request::post('username'))->first())
                {
                    dd(Users::where('username', Request::post('username'))->first());
                    $error['username'] = "Username già utilizzato";
                }
        }

        if (strlen(Request::post("password")) < 8) {
            $error['password'] = "Caratteri password insufficienti";
        } 
        if (strcmp(Request::post("password"), Request::post("confirm_password")) != 0) {
            $error['password'] = "Le password non coincidono";
        }
        if (!filter_var(Request::post('email'), FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Email non valida";
        } else {
            $res = Users::where("email", Request::post('email'))-> first();
            if ($res != null) {
                $error['email'] = "Email già utilizzata";
            }
        }
    

        if (count($error) == 0) {
            
            $user = new Users;
            $user->name = Request::post("name");
            $user->surname = Request::post("surname");
            $user->email =  Request::post("email");
            $user->username =  Request::post("username");
            $user->password = password_hash(Request::post("password"), PASSWORD_BCRYPT);
            $user->save(); 
           
                Session::push("username", $user->username );
                Session::push("user_id", $user->id );
                
            return redirect ("hw");
       }
    }
    else  {
        $error = ['Riempi tutti i campi'];
    }

    return redirect('re')->withInput()->withErrors($error);

    }

    public function prova(){

    }
}

