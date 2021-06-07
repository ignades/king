<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllScores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_scores', function (Blueprint $table) {
            $table->id();
            $table->string("league_id");
            $table->string("scheduled");
            $table->string("competition_id");
            $table->string("ps_score");
            $table->string("location");
            $table->string("odds_pre_vX")->nullable();
            $table->string("odds_pre_v1")->nullable();
            $table->string("odds_pre_v2")->nullable();
            $table->timestamp('last_changed')->nullable();
            $table->string("competition_name");
            $table->string("home_id"); 
            $table->string("score");
            $table->string("liga_id");
            $table->string("away_name");
            $table->string("time");
            $table->string("away_id");
            $table->string("ht_score");
            $table->string("home_name");
            $table->timestamp('added')->nullable();
            $table->string("h2h");
            $table->string("league_name");
            $table->string("status");
            $table->string("has_lineups");
            $table->string("ft_score");
            $table->string("events");
            $table->string("fixture_id");
            $table->string("et_score");
            $table->string("outcomes_half_time")->nullable();
            $table->string("outcomes_full_time")->nullable();
            $table->string("outcomes_extra_time")->nullable();        
            $table->string("info");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
