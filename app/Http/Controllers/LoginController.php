<?php
namespace App\Http\Controllers;
use App\Models\Users;
use Request;
use Session;

class LoginController extends Controller{
    public function log () {
        
        if(Session::has('user_id'))
        {
            return redirect('hw');
        }
        $error = array();

    if (!empty(Request::post("username")) && !empty(Request::post("password") ))
    {
    
        $user = Users::where("username", Request::post('username'))-> first();
        
        if ((!$user) ) {
            $error['username']="Username non trovato";
        }
        else{

        if (!password_verify(Request::post("password"), $user-> password)) {

            $error['password']="Password errata";

          }
     }
    }
    else {
        $error['username']=" Inserisci username e password";
    }
    if (count($error)==0){
        Session::put ('user_id', $user->id );
        return redirect ('hw');
    }
    else {
    return redirect ('login')-> withInput()-> withErrors($error);
        }   
     }

     public function logout (){
        Session::flush();
        return view ("home");
     }
    }
