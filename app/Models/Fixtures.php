<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixtures extends Model
{
    use HasFactory;
    protected $table = 'fixtures';
protected $fillable =[
    'id',
    'time',
    'league_id',
    'h2h',
    'home_name',
    'home_translations_fa',
    'home_translations_ar',
    'home_translations_ru',
    'location',
    'odds_live_vX',
    'odds_live_v1',
    'odds_live_v2',
    'odds_pre_vX',
    'odds_pre_v1',
    'odds_pre_v2',
    'round',
    'away_translations_fa',
    'away_translations_ar',
    'away_translations_ru',
    'away_id',
    'competition_id',
    'home_id',
    'league_name',
    'league_id_id',
    'league_country_id',
    'date',
    'fixture_id',
    'competition_name',
    'id_competition',
    'created_at',
    'updated_at'];
}
