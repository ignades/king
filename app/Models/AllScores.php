<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllScores extends Model
{
    use HasFactory;
    protected $table = 'all_scores';
protected $fillable = ['id',
'league_id',
'scheduled',
'competition_id',
'ps_score',
'location',
'odds_pre_vX',
'odds_pre_v1',
'odds_pre_v2',
'last_changed',
'competition_name',
'home_id', 
'score',
'liga_id',
'away_name',
'time',
'away_id',
'ht_score',
'home_name',
'added',
'h2h',
'league_name',
'status',
'has_lineups',
'ft_score',
'events',
'fixture_id',
'et_score',
'outcomes_half_time',
'outcomes_full_time',
'outcomes_extra_time',        
'info','created_at','updated_at'];
}
