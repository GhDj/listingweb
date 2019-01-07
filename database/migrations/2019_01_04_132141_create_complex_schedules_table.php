<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplexSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complex_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->time('start_at')->nullable();
            $table->time('ends_at')->nullable();
            $table->integer('day');
            $table->integer('time_id');
            $table->string('time_type');
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
        Schema::dropIfExists('complex_schedules');
    }
}
