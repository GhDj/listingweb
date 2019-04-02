<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('level')->nullable();
            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->integer('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('team_training_place', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city');
            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete("cascade");
            $table->integer('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('team_training_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('start_at');
            $table->datetime('ends_at');
            $table->integer('day');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::dropIfExists('team_training_schedule');
        Schema::dropIfExists('team_training_place');
        Schema::dropIfExists('teams');
    }
}
