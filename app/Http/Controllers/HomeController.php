<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Request;
use Session;

class HomeController extends Controller
{
    public function home (){
        
        return view ('home');
    }
    public function re ( ){
       
        return view('re');
    }
    
    public function login ( ){
        
        return view('login');
    }
    public function hw ( ){
        if(!Session::has('user_id'))
            {
                return redirect('login');
            }
        return view('hw');
    }
    public function about ( ){
        if(!Session::has('user_id'))
            {
                return redirect('home');
            }
        return view('about');
    }
    public function logout ( ){
        if(!Session::has('user_id'))
            {
                return redirect('home');
            }
        return view('logout');
    }

    public function profilo ( ){
        if(!Session::has('user_id'))
            {
                return redirect('home');
            }

        $userid= Session::get('user_id');

        
    $user = Users::where('id',$userid)
            ->first();
            
        return view('profilo')->with('username' ,$user->username);
    }
    
    public function gestione () {
        if(!Session::has('user_id'))
            {
                return redirect('home');
            }
        return view('gestione');
    }

    public function modifica_password () {
        if(!Session::has('user_id'))
            {
                return redirect('home');
            }
        return view('modifica_password');
    }
    public function  modifica_email () {
        if(!Session::has('user_id'))
            {
                return redirect('home');
            }
        return view('modifica_email');
    }

    public function  aggiorna_nome () {
        if(!Session::has('user_id'))
            {
                return redirect('home');
            }
        return view('aggiorna_nome');
    }

    public function check ($field) {
      
        $user = Users::where ($field, Request::get('q'))-> first() ;
        return ['exists' =>$user ? true : false ];
    }
    public function change_password(){
        $error = array();
        $userid = Session::get ('user_id');
        if (!empty(Request::post("password_old")) && !empty(Request::post("password")) && !empty(Request::post("confirm_password"))){
            
            if (strlen(Request::post("password")) < 8) {
                $error[] = "Caratteri password insufficienti";
            }

            $user = Users::where('id', $userid)->first();

            if(password_verify(Request::post('password_old'), $user->password)){
                if (strcmp(Request::post("password"), Request::post("confirm_password")) != 0) {
                    $error[] = "Le password non coincidono!";
                }

                if (password_verify(Request::post('password'), $user->password) && Request::post('password_old')===Request::post('password') ){
                    $error[] = "Password già usata";
                }

                if (count($error) == 0) {
                    $password = password_hash(Request::post('password'), PASSWORD_BCRYPT);
                    Users::where('id', $userid)->update(['password' => $password]);
                    return redirect('gestione');
                }
            }else if (empty(Request::post("password_old"))) {
                $error[] = "Riempi tutti i campi";
            }else {
                $error[] = "La password corrente non corrisponde";
            }
            return redirect('modifica_password')->withInput()->withErrors($error);
        }
    }
    
    public function check_password($pw){
        $id = Session::get('user_id');

        $user = Users::where('id', $id)->first();
        $boolean = password_verify($pw, $user->password);
        echo json_encode($boolean);
    }
   
    

    

}



