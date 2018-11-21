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

        Schema::create('terrains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->float('size');
            $table->integer('complex_id')->unsigned();
            $table->foreign('complex_id')->references('id')->on('complexes');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });


        Schema::create('equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('status');
            $table->integer('terrain_id')->unsigned();
            $table->foreign('terrain_id')->references('id')->on('terrains');
            $table->timestamps();
        });

        Schema::create('terrain_specialities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('speciality');
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
    }
}
