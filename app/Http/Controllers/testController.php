<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;
//use Goutte\Client;

class testController extends Controller
{
    public function test(){
        $data_url = 'https://data.nowgoal3.com/oddstats/2022202.html';
        $client = new Client();
        $response = $client->request('GET', $data_url);
        //dd($response);
        // echo $response->getBody()->getContents();
        
        $all = $response->getBody();
        $all = str_replace(">",">",$all);
        $all = str_replace("\r\n","<br/>",$all);
         

        $x = explode("<script type=\"text/javascript", $all);

        dd($x);die;

        preg_match("/<script>(.*?)<\/script>/", $x, $match);
        
        dd($match);
        
         die;
        //$crawler->filter('#league1')->each(function ($node) {
          //dd($node->substituteEntities);
          //preg_match('/<div class="my-con">(.*?)<\/div>/s', $htmlContent, $match);
        //});
    }
}
