<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('web_site')->nullable();
            $table->string('logo')->nullable();
            $table->string('sports')->nullable();
            $table->text('description');
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('club_sports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->integer('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('club_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('start_at');
            $table->datetime('ends_at');
            $table->integer('day');
            $table->integer('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('club_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('content');
            $table->integer('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
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
        Schema::dropIfExists('club_news');
        Schema::dropIfExists('club_schedule');
        Schema::dropIfExists('club_sports');
        Schema::dropIfExists('clubs');

    }
}
