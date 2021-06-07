<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableScores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->string("league_id");
            $table->string("scheduled");
            $table->string("competition_id");
            $table->string("ps_score");
            $table->string("location");
            $table->string("last_changed");
            $table->string("competition_name");
            $table->string("home_id");
            $table->string("score");
            $table->string("id_score");//id_score=id in json
            $table->string("away_name");
            $table->string("time");
            $table->string("away_id");
            $table->string("ht_score");
            $table->string("home_name");
            $table->string("added");
            $table->string("h2h");
            $table->string("league_name");
            $table->string("status");
            $table->string("has_lineups");
            $table->string("ft_score");
            $table->string("events");
            $table->string("fixture_id");
            $table->string("et_score");
            $table->string("half_time")->nullable();
            $table->string("full_time")->nullable();
            $table->string("extra_time")->nullable();
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
        Schema::table('scores', function (Blueprint $table) {
            //
        });
    }
}
