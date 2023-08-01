<?php
namespace App\Http\Controllers;
use App\Models\Elenco;
use App\Models\Deck;
use App\Models\Users;
use Request;
use Session;
use Illuminate\Support\Facades\DB;

class fetchController extends Controller{

    public function nome (){
    
    $query = urlencode(Request::get ("name"));
    $curl  = curl_init();
    $url = 'https://db.ygoprodeck.com/api/v7/cardinfo.php?name='.$query;
    curl_setopt($curl, CURLOPT_URL, $url );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    echo $result;
    
}

public function livello (){
    
    $query = urlencode(Request::get ("level"));
    $curl  = curl_init();
    $url = 'https://db.ygoprodeck.com/api/v7/cardinfo.php?level='.$query;
    curl_setopt($curl, CURLOPT_URL, $url );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    $json = json_decode($result, true);
    curl_close($curl);
    echo $result;
}    public function tipo (){
    
    $query = urlencode(Request::get ("race"));
    $curl  = curl_init();
    $url = 'https://db.ygoprodeck.com/api/v7/cardinfo.php?race='.$query;
    curl_setopt($curl, CURLOPT_URL, $url );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    $json = json_decode($result, true);
    curl_close($curl);
    echo $result;
}    public function tipologia (){
    
    $query = urlencode(Request::get ("type"));
    $curl  = curl_init();
    $url = 'https://db.ygoprodeck.com/api/v7/cardinfo.php?type='.$query;
    curl_setopt($curl, CURLOPT_URL, $url );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    $json = json_decode($result, true);
    curl_close($curl);
    echo $result;
}    public function attributo (){
    
    $query = urlencode(Request::get ("attribute"));
    $curl  = curl_init();
    $url = 'https://db.ygoprodeck.com/api/v7/cardinfo.php?attribute='.$query;
    curl_setopt($curl, CURLOPT_URL, $url );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    $json = json_decode($result, true);
    curl_close($curl);
    echo $result;
}    public function archetipo (){
    
    $query = urlencode(Request::get ("archetype"));
    $curl  = curl_init();
    $url = 'https://db.ygoprodeck.com/api/v7/cardinfo.php?archetype='.$query;
    curl_setopt($curl, CURLOPT_URL, $url );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    $json = json_decode($result, true);
    curl_close($curl);
    echo $result;
}
public function all (){
    
    $curl  = curl_init();
    $url = 'https://db.ygoprodeck.com/api/v7/cardinfo.php';
    curl_setopt($curl, CURLOPT_URL, $url );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    $json = json_decode($result, true);
    curl_close($curl);
    echo $result;
}

    public function elenco(){

    $user_id=Session::get ('user_id');

    $elenco = new Elenco;
    $elenco->user=$user_id;
    $elenco->nome = (Request::get ("nome"));
    $elenco->cod = (Request::get ("cod"));
    $elenco->rarity = (Request::get ("rarity"));
    $elenco->price = (Request::get ("price"));
    $elenco->immagine = (Request::get ("immagine"));
    $elenco->save(); 


    }

    public function deck(){

        $user_id=Session::get ('user_id');
        $nome=Request::get("nome");

        $count = Deck::select('deck')
        ->where('user', $user_id)
    ->where('nome',$nome)
    ->count();

    $count2 = Deck::select('user')
    ->where('user', $user_id)

    ->count();
      
        if($count<3 && $count2<60){
        $deck = new Deck;
        $deck->user=$user_id;
        $deck-> id= (Request::get ("id"));
        $deck->nome = (Request::get ("nome"));
        $deck->cod = (Request::get ("cod"));
        $deck->rarity = (Request::get ("rarity"));
        $deck->price = (Request::get ("price"));
        $deck->immagine = (Request::get ("immagine"));
        $deck->save(); 
        }
        else if ($count2 >= 60){
        return response()->json($count2);
        }
    
        return response()->json($count);

        }

    public function fetch_database(){

        if(!Session::has('user_id'))
        {
            return redirect('login');
        }
        $user_id = Session('user_id');


//        $risultati = DB::select( "SELECT elenco.*, deck.id as d_id FROM elenco LEFT JOIN deck ON deck.id = elenco.id");

        $risultati =Elenco::leftJoin('deck','deck.id', '=', 'elenco.id')
        ->select('deck.id as d_id' ,'elenco.*')
        ->where('elenco.user','=', $user_id )
        ->get();

        return response()->json($risultati);

    
    }
    
    

    public function fetch_deck(){

        if(!Session::has('user_id'))
        {
            return redirect('login');
        }
        $user_id = Session('user_id');

        
        $risultati = Deck::select('id', 'user', 'cod', 'nome','rarity', 'immagine','price')
                ->where('user','=', $user_id)
                ->get();
            
                
        return $risultati;

    }

    public function totale (){
        if(!Session::has('user_id'))
        {
            return redirect('login');
        }
        $user_id = Session('user_id');
        
        $risultati = DB::select("SELECT SUM(price) as somma FROM deck where user=$user_id");
            
                
        return $risultati;


    }
    public function totale_database (){
        if(!Session::has('user_id'))
        {
            return redirect('login');
        }
        $user_id = Session('user_id');
        
        $risultati = DB::select("SELECT SUM(price) as somma FROM elenco where user=$user_id");
            
                
        return $risultati;


    }
    public function delete_deck (){

        if(!Session::has('user_id'))
        {
            return redirect('login');
        }
        $user_id = Session('user_id');
        
       // $risultati = DB::select("DELETE FROM deck WHERE user=$user_id");    
        $risultati = Deck::select('id')
        ->where('user',$user_id)
        ->delete();
                
        return $risultati;
    
    }

    public function delete (){

        if(!Session::has('user_id'))
        {
            return redirect('login');
        }

        $cod=(Request::get ("cod"));
        $id=(Request::get ("id"));
        $risultati= Deck::select('id', 'user', 'cod', 'nome','rarity', 'immagine','price')
                ->where('id','=', $id)
                ->where('cod','=', $cod)
                ->delete();
        return $risultati;
    
    }
    
    public function delete_database (){

        if(!Session::has('user_id'))
        {
            return redirect('login');
        }

        $id=(Request::get ("id"));
        $risultati= DB::table('elenco')
                ->select('id', 'user', 'cod', 'nome','rarity', 'immagine','price')
                ->where('id','=', $id)
                ->delete();
        return $risultati;
    
    }

    public function utente (){

            if(!Session::has('user_id'))
            {
                return redirect('login');
            }
            $user_id = Session('user_id');
            
            $risultati = Users::select('id', 'username','email','name','surname' )
                    ->where('id','=', $user_id)
                    ->get();
                
                    
            return $risultati;
    
        }    


        public function elimina_utente() {
            $user_id = session('user_id');
        
            $risultati = Users::
                where('id', $user_id)
                ->delete();
                return redirect('logout');
            }
        
        public function delete_all (){

       
        $user_id = Session('user_id');
        
        $risultati = Elenco::where('user',$user_id)
                ->delete();
        //("DELETE FROM elenco WHERE user=$user_id");    
                
        return $risultati;
    
    }

    public function checkID (){

        $id=(Request::get ("id"));

        $risultati = DB::table('deck')
        ->select('id')
        ->where('id','=', $id)
        ->get();
        
        return $risultati;
    }

    

}