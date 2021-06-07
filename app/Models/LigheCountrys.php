<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigheCountrys extends Model
{
    use HasFactory;
    protected $table = 'lighe_countries';
    protected $fillable = ['id','league_id','name','country_id','scores','created_at','updated_at'];
}
