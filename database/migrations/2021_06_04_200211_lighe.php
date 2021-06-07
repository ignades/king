<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lighe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lighe', function (Blueprint $table) {
            $table->id();
            $table->string('country_id');
            $table->string('name');
            $table->string('is_real');
            $table->string('leagues');
            $table->string('scores');
            $table->string('federation_id');
            $table->string('federation_name');
            $table->string('national_team')->nullable();
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
