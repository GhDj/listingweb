<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClubRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_request', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(1);
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->integer('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('club')->onDelete('cascade');
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
        Schema::dropIfExists('club');
        Schema::dropIfExists('club_request');
    }
}
