<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfrastructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('complexes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->string('web_site');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('addresses');
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->timestamps();
        });


        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->integer('complex_id')->unsigned();
            $table->foreign('complex_id')->references('id')->on('complexes');
            $table->timestamps();
        });

        Schema::create('terrain_specialities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('speciality');
            $table->timestamps();
        });

        Schema::create('terrains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->text('description');
            $table->float('size');
            $table->integer('speciality_id')->unsigned();
            $table->foreign('speciality_id')->references('id')->on('terrain_specialities');
            $table->integer('complex_id')->unsigned();
            $table->foreign('complex_id')->references('id')->on('complexes');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('terrain_id')->unsigned();
            $table->foreign('terrain_id')->references('id')->on('terrains');
            $table->timestamps();
        });

          Schema::create('teams', function (Blueprint $table) {
              $table->increments('id');
              $table->string('name');
              $table->string('level');
              $table->integer('speciality_id')->unsigned();
              $table->foreign('speciality_id')->references('id')->on('terrain_specialities');
              $table->integer('club_id')->unsigned();
              $table->foreign('club_id')->references('id')->on('clubs');
              $table->timestamps();
          });

        Schema::create('equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->float('hauteur')->nullable();
            $table->float('longueur')->nullable();
            $table->float('largueur')->nullable();
            $table->string('status');
            $table->integer('speciality_id')->unsigned();
            $table->foreign('speciality_id')->references('id')->on('terrain_specialities');
            $table->integer('terrain_id')->unsigned();
            $table->foreign('terrain_id')->references('id')->on('terrains');
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
        Schema::dropIfExists('complex');
        Schema::dropIfExists('terrain_specialities');
        Schema::dropIfExists('terrains');
        Schema::dropIfExists('equipements');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('clubs');
    }
}
