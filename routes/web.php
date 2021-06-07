<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LivescoreController;
use App\Http\Controllers\testController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/test', function () {
    return view('test');
});

//ApiController
//Route::get('/apitest', [ApiController::class, 'show']);
 
Route::get('lighe', [HomeController::class, 'index'])->name('home');
Route::get('lighe/{id}', [LivescoreController::class, 'mostra_competizioni']);

Route::get('mostra_score', [LivescoreController::class, 'mostra_score']);
Route::get('mostra_all_scores', [LivescoreController::class, 'mostra_all_scores']);
Route::post('mostra_score', [LivescoreController::class, 'mostra_score']);

//Competitions
Route::get('mostra_scores_competitions', [LivescoreController::class, 'mostra_scores_competitions']);
Route::post('mostra_scores_competitions', [LivescoreController::class, 'mostra_scores_competitions']);


//Fixtures show_fixtures
Route::get('mostra_fixtures', [LivescoreController::class, 'mostra_fixtures']);
Route::post('mostra_fixtures', [LivescoreController::class, 'mostra_fixtures']);


//save
Route::get('save_fixtures', [LivescoreController::class, 'save_fixtures']);
Route::get('salva_lista_lighe', [LivescoreController::class, 'salva_lista_lighe']);
Route::get('save_league_country', [LivescoreController::class, 'save_league_country']);

Route::get('salva_scores', [LivescoreController::class, 'salva_scores']);
 
Route::get('save_conpetitions', [LivescoreController::class, 'save_conpetitions']);
 

Route::prefix('livescores')->group(function () {
    Route::get('scores', [LivescoreController::class, 'show_scores'])->name('apiScores');
});

Route::resource('livescores', LivescoreController::class);


//testController
Route::get('/test', [testController::class, 'test']);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

 
 