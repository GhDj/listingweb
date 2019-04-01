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
            $table->datetime('start_at');
            $table->datetime('ends_at');
            $table->integer('day');
            $table->integer('group_id');
            $table->string('group_type');
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
