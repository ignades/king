<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Livescore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Lighe;
use App\Models\ListaLighe;
use App\Models\LigheCountrys;
use App\Models\Competitions;
use App\Models\Scores;
use App\Models\AllScores;
use DB;

class LivescoreController extends Controller
{
    private $api_key;
    private $apiSecret;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livescore  $livescore
     * @return \Illuminate\Http\Response
     */
    public function show_scores(Livescore $livescore)
    {

        $this->apiKey = Config::get('livescore.api_key');
        $this->apiSecret = Config::get('livescore.api_secret');

        $client = new Client(); //GuzzleHttp\Client
        $url = "http://livescore-api.com/api-client/scores/live.json?key=" . $this->apiKey . "&secret=" . $this->apiSecret;


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('home')->with('partite',$responseBody);
        //return view('home.apiwithoutkey', compact('responseBody'));
    }


    public function mostra_scores_competitions(Competitions $competitions,Request $request){
        $lighe = new Competitions;
        $nome = $request->nome_competizione;
        $scores_competitions = $lighe->where('name',$nome)->get();       

        return view('scores')->with('scores',$scores_competitions);
    }


    public function mostra_score(Livescore $livescore,Request $request)
    {

        $this->apiKey = Config::get('livescore.api_key');
        $this->apiSecret = Config::get('livescore.api_secret');
        
        $client = new Client(); //GuzzleHttp\Client
        $url = $request->url; 
        // $file = fopen("data.txt","w");
        // fwrite($file,$url);
        // fclose($file);
        // die;
        //$url = "http://livescore-api.com/api-client/scores/live.json?key=" . $this->apiKey . "&secret=" . $this->apiSecret;


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
        $scores = array();
        $data = (object) $responseBody;
        foreach($data->data->match  as  $k=>$value){
            $scores[$k]["league_id"]=$value->league_id;
            $scores[$k]["scheduled"]=$value->scheduled;
            $scores[$k]["competition_id"]=$value->competition_id;
            $scores[$k]["ps_score"]=$value->ps_score;
            $scores[$k]["location"]=$value->location;
            $scores[$k]["last_changed"]=$value->last_changed;
            $scores[$k]["competition_name"]=$value->competition_name;
            $scores[$k]["home_id"]=$value->home_id;
            $scores[$k]["score"]=$value->score;
            $scores[$k]["id_score"]=$value->id_score;
            $scores[$k]["away_name"]=$value->away_name;
            $scores[$k]["time"]=$value->time;
            $scores[$k]["away_id"]=$value->away_id;
            $scores[$k]["ht_score"]=$value->ht_score;
            $scores[$k]["home_name"]=$value->home_name;
            $scores[$k]["added"]=$value->added;
            $scores[$k]["h2h"]=$value->h2h;
            $scores[$k]["league_name"]=$value->league_name;
            $scores[$k]["status"]=$value->status;
            $scores[$k]["has_lineups"]=$value->has_lineups;
            $scores[$k]["ft_score"]=$value->ft_score;
            $scores[$k]["events"]=$value->events;
            $scores[$k]["fixture_id"]=$value->fixture_id;
            $scores[$k]["et_score"]=$value->et_score;
            $scores[$k]["half_time"]=$value->half_time;
            $scores[$k]["full_time"]=$value->full_time;
            $scores[$k]["extra_time"]=$value->extra_time;
            $scores[$k]["info"]=$value->info;
        }

        return view('scores')->with('scores',$responseBody);
        //return view('home.apiwithoutkey', compact('responseBody'));
    }

    public function mostra_all_scores(AllScores $scores){
         
        $scores = new AllScores;
        $scores = $scores->all();  //$lighe->where('country_id',$id)->get();       

        return view('scores')->with('scores',$scores);
    }

    public function mostra_lighe(ListaLighe $lighe,$id){
         
        $lighe = new LigheCountrys;
        $lighe = $lighe->where('country_id',$id)->get();       

        $jsonString = file_get_contents(base_path('resources/countries/countries.json'));

        $countries = json_decode($jsonString, true);
      

        return view('home')->with('lighe',$lighe)->with('countries',$countries);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livescore  $livescore
     * @return \Illuminate\Http\Response
     */
    public function edit(Livescore $livescore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livescore  $livescore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livescore $livescore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livescore  $livescore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livescore $livescore)
    {
        //
    }

    public function salva_countries(Lighe $lighe,$id){
           
        $lighe = Lighe::all();
        $lighe_count = $lighe->count();
        if($lighe_count==0){
            //salva nuovi dati
            echo "Salva nel db";
           
            $this->apiKey = Config::get('livescore.api_key');
            $this->apiSecret = Config::get('livescore.api_secret');
    
            $client = new Client(); //GuzzleHttp\Client
            //$url = "http://livescore-api.com/api-client/scores/live.json?key=" . $this->apiKey . "&secret=" . $this->apiSecret;
            $url = "https://livescore-api.com/api-client/countries/list.json?key=" . $this->apiKey . "&secret=" . $this->apiSecret;
    
    
            $response = $client->request('GET', $url, [
                'verify'  => false,
            ]);
    
            $responseBody = json_decode($response->getBody());
            $countries = array();
            $data = (object) $responseBody;
             foreach($data->data->country  as  $k=>$value){
                $countries[$k]["country_id"] = $value->id;
                $countries[$k]["name"] = $value->name;
                $countries[$k]["is_real"] = $value->is_real;
                $countries[$k]["leagues"] = $value->leagues;
                $countries[$k]["scores"] = $value->scores;
                $countries[$k]["national_team"] = $value->scores;                
                $countries[$k]["federation_id"] = $value->federation->id;
                $countries[$k]["federation_name"] = $value->federation->name;
                $countries[$k]["created_at"] = now();
                $countries[$k]["updated_at"] = now();
 
             }

            DB::table('lighe')->insert( $countries );
            die;
                

        }else{
            echo "Fai query";
        }

     }

    public function salva_lista_lighe(ListaLighe $lista_lighe){
        //https://livescore-api.com/api-client/countries/list.json?&key=7zXAlfvBwPhqvBuS&secret=0OA7qKTWEDKhLolSYitkyYW5NdviO0bP    
        
        $lighe = ListaLighe::all();
        $lighe_count = $lighe->count();
        if($lighe_count==0){
            //salva nuovi dati
            echo "Salva nel db";
           
            $this->apiKey = Config::get('livescore.api_key');
            $this->apiSecret = Config::get('livescore.api_secret');
    
            $client = new Client(); //GuzzleHttp\Client
            //$url = "http://livescore-api.com/api-client/scores/live.json?key=" . $this->apiKey . "&secret=" . $this->apiSecret;
            $url = 'https://livescore-api.com/api-client/leagues/list.json?&key=7zXAlfvBwPhqvBuS&secret=0OA7qKTWEDKhLolSYitkyYW5NdviO0bP';
    
    
            $response = $client->request('GET', $url, [
                'verify'  => false,
            ]);
    
            $responseBody = json_decode($response->getBody());
            $countries = array();
            $data = (object) $responseBody;
             foreach($data->data->league  as  $k=>$value){
                $countries[$k]["id_lega"] = $value->id;
                $countries[$k]["name"] = $value->name;
                $countries[$k]["country_id"] = $value->country_id;
                $countries[$k]["scores"] = $value->scores;
                $countries[$k]["created_at"] = now();
                $countries[$k]["updated_at"] = now();
 
             }

            DB::table('lista_lighe')->insert( $countries );
            
                

        }else{
            echo "Fai query";
        }
    }


    public function save_league_country(LigheCountrys $league_countries){
       // 
       $lighe = LigheCountrys::all();
       $lighe_count = $lighe->count();
       if($lighe_count==0){
           //salva nuovi dati
           echo "Salva nel db";
          
           $this->apiKey = Config::get('livescore.api_key');
           $this->apiSecret = Config::get('livescore.api_secret');
   
           $client = new Client(); //GuzzleHttp\Client
           //$url = "http://livescore-api.com/api-client/scores/live.json?key=" . $this->apiKey . "&secret=" . $this->apiSecret;
           $url = 'https://livescore-api.com/api-client/leagues/list.json?&key=7zXAlfvBwPhqvBuS&secret=0OA7qKTWEDKhLolSYitkyYW5NdviO0bP&country=6';
   
   
           $response = $client->request('GET', $url, [
               'verify'  => false,
           ]);
   
           $responseBody = json_decode($response->getBody());
           $countries = array();
           $data = (object) $responseBody;
            foreach($data->data->league  as  $k=>$value){
               $countries[$k]["league_id"] = $value->id;
               $countries[$k]["name"] = $value->name;
               $countries[$k]["country_id"] = $value->country_id;
               $countries[$k]["scores"] = $value->scores;
               $countries[$k]["created_at"] = now();
               $countries[$k]["updated_at"] = now();
            }

           DB::table('lighe_countries')->insert( $countries );
           
               

       }else{
           echo "Fai query";
       }
    }



    public function save_conpetitions(Competitions $competitions){
        //https://livescore-api.com/api-client/competitions/list.json?key=7zXAlfvBwPhqvBuS&secret=0OA7qKTWEDKhLolSYitkyYW5NdviO0bP
    
    
        $lighe = Competitions::all();
        $lighe_count = $lighe->count();
        if($lighe_count==0){
            //salva nuovi dati
            echo "Salva nel db";
           
            $this->apiKey = Config::get('livescore.api_key');
            $this->apiSecret = Config::get('livescore.api_secret');
    
            $client = new Client(); //GuzzleHttp\Client
            //$url = "http://livescore-api.com/api-client/scores/live.json?key=" . $this->apiKey . "&secret=" . $this->apiSecret;
            $url = 'https://livescore-api.com/api-client/competitions/list.json?key=7zXAlfvBwPhqvBuS&secret=0OA7qKTWEDKhLolSYitkyYW5NdviO0bP';
    
    
            $response = $client->request('GET', $url, [
                'verify'  => false,
            ]);
    
            $responseBody = json_decode($response->getBody());
            $competitions = array();
            $data = (object) $responseBody;
 
            
            foreach($data->data->competition  as  $k=>$value){
                $competitions[$k]["id_competition"] = $value->id; 
                $competitions[$k]["name"] = $value->name;
                $competitions[$k]["is_league"]  = $value->is_league;
                $competitions[$k]["is_cup"] = $value->is_cup;
                $competitions[$k]["tier"] = $value->tier;
                $competitions[$k]["has_groups"]  = $value->has_groups;
                $competitions[$k]["active"]  = $value->active;
                $competitions[$k]["national_teams_only"] = $value->national_teams_only;
                $competitions[$k]["countries_id"] = $value->id;
                $competitions[$k]["countries_name"] = !empty($value->countries{0}->name) ? $value->countries{0}->name : null;
                $competitions[$k]["countries_flag"] = !empty($value->countries{0}->flag) ? $value->countries{0}->flag : null;
                $competitions[$k]["countries_fifa_code"] = !empty($value->countries{0}->fifa_code) ? $value->countries{0}->fifa_code : null; 
                $competitions[$k]["countries_uefa_code"] = !empty($value->countries{0}->uefa_code) ? $value->countries{0}->uefa_code : null; 
                $competitions[$k]["countries_is_real"] = !empty($value->countries{0}->is_real) ? $value->countries{0}->is_real : null; 
                $competitions[$k]["federation_id"] = !empty($value->federations{0}->id) ? $value->federations{0}->id : null;  
                $competitions[$k]["federation_name"] = !empty($value->federations{0}->name) ? $value->federations{0}->name : null;
                $competitions[$k]["created_at"] = now();
                $competitions[$k]["updated_at"] = now();
             }
 
            DB::table('competitions')->insert($competitions );
            
                
 
        }else{
            echo "Fai query";
        }
    
    

    }


    public function salva_scores(AllScores $all_scores){
        //https://livescore-api.com/api-client/countries/list.json?&key=7zXAlfvBwPhqvBuS&secret=0OA7qKTWEDKhLolSYitkyYW5NdviO0bP    
        
        $all_scores = AllScores::all();
        $scores_count = $all_scores->count();
        if($scores_count==0){
            //salva nuovi dati
            echo "Salva nel db";
           
            $this->apiKey = Config::get('livescore.api_key');
            $this->apiSecret = Config::get('livescore.api_secret');
    
            $client = new Client(); //GuzzleHttp\Client
            //$url = "http://livescore-api.com/api-client/scores/live.json?key=" . $this->apiKey . "&secret=" . $this->apiSecret;
            //$url = 'https://livescore-api.com/api-client/leagues/list.json?&key=7zXAlfvBwPhqvBuS&secret=0OA7qKTWEDKhLolSYitkyYW5NdviO0bP';
           // $url = 'http://livescore-api.com/api-client/scores/live.json?key=7zXAlfvBwPhqvBuS&secret=0OA7qKTWEDKhLolSYitkyYW5NdviO0bP';
            $url = 'https://livescore-api.com/api-client/scores/live.json?key=7zXAlfvBwPhqvBuS&secret=0OA7qKTWEDKhLolSYitkyYW5NdviO0bP';
            $response = $client->request('GET', $url, [
                'verify'  => false,
            ]);
    
            $responseBody = json_decode($response->getBody());
            $scores = array();
            $data = (object) $responseBody;
             foreach($data->data->match  as  $k=>$value){
                $scores[$k]["league_id"]= $value->league_id;
                $scores[$k]["scheduled"]= $value->scheduled;
                $scores[$k]["competition_id"]= $value->competition_id;
                $scores[$k]["ps_score"]= $value->ps_score;
                $scores[$k]["location"]= $value->location;
                $scores[$k]["odds_pre_vX"] = $value->odds->pre->X;
                $scores[$k]["odds_pre_v1"] = $value->odds->pre->{1};
                $scores[$k]["odds_pre_v2"] = $value->odds->pre->{2};
                $scores[$k]["last_changed"] = $value->last_changed;
                $scores[$k]["competition_name"] = $value->competition_name;
                $scores[$k]["home_id"] = $value-> home_id;
                $scores[$k]["score"] = $value->score;
                $scores[$k]["liga_id"] = $value->id;
                $scores[$k]["away_name"] = $value->away_name;
                $scores[$k]["time"] = $value->time;
                $scores[$k]["away_id"] = $value->away_id;
                $scores[$k]["ht_score"] = $value->ht_score;
                $scores[$k]["home_name"] = $value->home_name;
                $scores[$k]["added"] = $value->added;
                $scores[$k]["h2h"]= $value->h2h;
                $scores[$k]["league_name"]= $value->league_name;
                $scores[$k]["status"]= $value->status;
                $scores[$k]["has_lineups"]= $value->has_lineups;
                $scores[$k]["ft_score"]= $value->ft_score;
                $scores[$k]["events"]= $value->events;
                $scores[$k]["fixture_id"]= $value->fixture_id;
                $scores[$k]["et_score"]= $value->et_score;
                $scores[$k]["outcomes_half_time"] = $value->outcomes->half_time;
                $scores[$k]["outcomes_full_time"] = $value->outcomes->full_time;
                $scores[$k]["outcomes_extra_time"] = $value->outcomes->extra_time;
                $scores[$k]["info"]= $value->info;
             }

            DB::table('all_scores')->insert( $scores );
            
                

        }else{
            echo "Fai query";
        }
    }

}
