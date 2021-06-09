<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test2Controller extends Controller
{
    public function mia(){
         $test = array("0"=>"prova");   
        return view('nuova')->with("test",$test);
    }
}
