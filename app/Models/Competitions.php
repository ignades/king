<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitions extends Model
{
    use HasFactory;
    protected $table = 'competitions';
    protected $fillable =['id','id_competition','name','is_league','is_cup','tier','has_groups','active','national_teams_only','countries_id','countries_name','countries_flag','countries_fifa_code','countries_uefa_code','countries_is_real','federation_id','federation_name'];
}
