<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_times', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('userId');
            $table->date('data');
            $table->time('start');
            $table->time('end')->nullable();
            $table->time('workingTime')->nullable();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->index('data');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('working_times');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}