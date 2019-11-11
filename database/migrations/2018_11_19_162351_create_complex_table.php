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
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('view_count')->default(0);
            $table->integer('type')->default(1); // 1 -> public , 2 private
            $table->string('web_site')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->integer('installation_id')->nullable();
            $table->timestamps();
        });


        Schema::create('complex_request', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(1);
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->integer('complex_id')->unsigned();
            $table->foreign('complex_id')->references('id')->on('complex')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('complex_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('start_at');
            $table->datetime('ends_at');
            $table->integer('day');
            $table->integer('status')->default(1);
            $table->integer('group_id')->nullable();
            $table->string('group_type')->nullable();
            $table->timestamps();
        });


        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        Schema::create('sports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('sport_categories_id')->unsigned();
            $table->foreign('sport_categories_id')->references('id')->on('sport_categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('sport_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('infrastructure', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reception')->nullable();
            $table->string('reception_choices')->default("");
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
            $table->text('description');
            $table->float('length');
            $table->float('width');
            $table->float('height');
            $table->integer('lighting');
            $table->string('terrain_nature'); //couvert , decouvert, autre
            $table->string('soil_type');
            $table->integer('video_recorder');
            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->integer('complex_id')->unsigned();
            $table->foreign('complex_id')->references('id')->on('Complex')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('terrain_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('start_at');
            $table->datetime('ends_at');
            $table->integer('day');
            $table->integer('status')->default(1);
            $table->integer('group_id');
            $table->string('group_type');
            $table->timestamps();
        });

        Schema::create('terrain_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sport_category_id')->unsigned();
            $table->foreign('sport_category_id')->references('id')->on('sport_categories')->onDelete('cascade');
            $table->integer('terrain_id')->unsigned();
            $table->foreign('terrain_id')->references('id')->on('terrains')->onDelete('cascade');
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
