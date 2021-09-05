<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fullShifts', function (Blueprint $table) {
            $table->integer('id','true');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('branch_shift_id');
            $table->foreign('branch_shift_id')->references('id')->on('branch_shifts');
            $table->integer('shift_type_id')->nullable();
            $table->foreign('shift_type_id')->references('id')->on('shiftType');
            $table->date('date');
            $table->time('scheduled_from')->nullable();
            $table->time('scheduled_to')->nullable();
            $table->time('clock_in');
            $table->time('clock_out');
            $table->tinyInteger('approved')->default('0');
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('fullShifts');
    }
}
