<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Competitions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string("id_competition"); 
            $table->string("name");
            $table->string("is_league")->nullable(); 
            $table->string("is_cup")->nullable(); 
            $table->string("tier")->nullable(); 
            $table->string("has_groups")->nullable();  
            $table->string("active");  
            $table->string("national_teams_only");
            $table->string("countries_id")->nullable();
            $table->string("countries_name")->nullable();
            $table->string("countries_flag")->nullable();
            $table->string("countries_fifa_code")->nullable();
            $table->string("countries_uefa_code")->nullable();
            $table->string("countries_is_real")->nullable();
            $table->string("federation_id")->nullable();
            $table->string("federation_name")->nullable();
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
