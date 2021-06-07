<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFixtures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
        $table->id();
        $table->string("time");
        $table->string("league_id");
        $table->string("h2h");
        $table->string("home_name");
        $table->string("home_translations_fa")->nullable();
        $table->string("home_translations_ar")->nullable();
        $table->string("home_translations_ru")->nullable();
        $table->string("location");
        $table->string("odds_live_vX")->nullable();
        $table->string("odds_live_v1")->nullable();
        $table->string("odds_live_v2")->nullable();
        $table->string("odds_pre_vX")->nullable();
        $table->string("odds_pre_v1")->nullable();
        $table->string("odds_pre_v2")->nullable();
        $table->string("round");
        $table->string("away_translations_fa")->nullable();
        $table->string("away_translations_ar")->nullable();
        $table->string("away_translations_ru")->nullable();
        $table->string("away_id");
        $table->string("competition_id");
        $table->string("home_id");
        $table->string("league_name")->nullable();
        $table->string("league_id_id")->nullable();
        $table->string("league_country_id")->nullable();
        $table->string("date")->nullable();
        $table->string("fixture_id")->nullable();
        $table->string("competition_name")->nullable();
        $table->string("id_competition")->nullable();
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
