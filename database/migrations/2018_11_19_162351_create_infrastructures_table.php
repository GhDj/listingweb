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

        Schema::create('terrain_specialities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('speciality');
            $table->timestamps();
        });

        Schema::create('equipements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('status');
            $table->integer('media_id')->unsigned();
            $table->foreign('media_id')->references('id')->on('medias');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->timestamps();
        });

        Schema::create('terrains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->float('size');
            $table->integer('speciality_id')->unsigned();
            $table->foreign('speciality_id')->references('id')->on('terrain_specialities');
            $table->integer('equipement_id')->unsigned();
            $table->foreign('equipement_id')->references('id')->on('equipements');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('media_id')->unsigned();
            $table->foreign('media_id')->references('id')->on('medias');
            $table->timestamps();
        });

        Schema::create('complexes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->string('web_site');
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->integer('terrain_id')->unsigned();
            $table->foreign('terrain_id')->references('id')->on('terrains');
            $table->integer('media_id')->unsigned();
            $table->foreign('media_id')->references('id')->on('medias');
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
