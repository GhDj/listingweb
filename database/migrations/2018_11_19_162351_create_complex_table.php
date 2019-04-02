<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('complex', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('web_site');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('complex_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('start_at');
            $table->datetime('ends_at');
            $table->integer('day');
            $table->integer('group_id');
            $table->string('group_type');
            $table->timestamps();
        });


        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->integer('complex_id')->unsigned();
            $table->foreign('complex_id')->references('id')->on('Complex')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('sports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });


        Schema::create('infrastructure', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reception')->nullable();
            $table->integer('catering_space')->nullable();
            $table->string('handicap_access')->nullable();
            $table->integer('tribune_count')->nullable();
            $table->integer('spectator_tribune_count')->nullable();
            $table->integer('cloakroom_player')->nullable();
            $table->integer('cloakroom_referee')->nullable();
            $table->integer('sports_sanitary')->nullable();
            $table->integer('parking_place')->nullable();
            $table->integer('handicap_parking_place')->nullable();
            $table->integer('complex_id')->unsigned();
            $table->foreign('complex_id')->references('id')->on('complex')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('terrains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->text('description');
            $table->float('size');
            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->integer('complex_id')->unsigned();
            $table->foreign('complex_id')->references('id')->on('Complex')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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

        Schema::dropIfExists('terrains');
        Schema::dropIfExists('infrastructure');
        Schema::dropIfExists('sports');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('complex_schedules');
        Schema::dropIfExists('complex');

    }
}
