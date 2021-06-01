<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wrapper\LiveScoreAPI;
use Illuminate\Support\Facades\Config;

class ApiController extends Controller
{
    public function show(){
        $api_key = Config::get('livescore.api_key');
        $api_secret = Config::get('livescore.api_secret');
        $api = new LiveScoreAPI($api_key,$api_secret);
        $partite = $api->liveMatches(); //return array of Match objects
         
        return view('home')->with('partite',$partite);
         
    }
}
