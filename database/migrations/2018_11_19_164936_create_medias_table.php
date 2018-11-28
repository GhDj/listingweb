<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->integer('type'); // 1-complex gallery | 2-terrain gallery | 3-equipment gallery
            // 4-reports images | 5-post images | 7-ads banners | 8-products images
            $table->integer('terrain_id')->unsigned()->nullable();
            $table->foreign('terrain_id')->references('id')->on('terrains');
            $table->integer('equipment_id')->unsigned()->nullable();
            $table->foreign('equipment_id')->references('id')->on('equipments');
            $table->integer('complex_id')->unsigned()->nullable();
            $table->foreign('complex_id')->references('id')->on('complexes');
            $table->integer('report_id')->unsigned()->nullable();
            $table->foreign('report_id')->references('id')->on('reports');
            $table->integer('post_id')->unsigned()->nullable();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });

        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); // 1 published / 2 unpublished
            $table->integer('place'); // 1 header | 2 footer | 3 under search bar // from 10+ pagess
            $table->integer('media_id')->unsigned()->nullable();
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
        Schema::dropIfExists('medias');
    }
}