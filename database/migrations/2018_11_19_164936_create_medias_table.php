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
            // 4-reports images | 5-post images | 7-ads banners | 8-products images | 9-category image | 10 - -1 Unverified
            $table->integer('review_id')->unsigned()->nullable();
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
            $table->integer('team_id')->unsigned()->nullable();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->integer('club_id')->unsigned()->nullable();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->integer('terrain_id')->unsigned()->nullable();
            $table->foreign('terrain_id')->references('id')->on('terrains')->onDelete('cascade');
            $table->integer('complex_id')->unsigned()->nullable();
            $table->foreign('complex_id')->references('id')->on('Complex')->onDelete('cascade');
            $table->integer('report_id')->unsigned()->nullable();
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            $table->integer('post_id')->unsigned()->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('status')->default(0); // 0-non validé par l'admin 1 - validé par l'admin
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
