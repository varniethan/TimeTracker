<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_shifts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_shift_id');
            $table->foreign('organisation_shift_id')->references('id')->on('organisation_shifts');
            $table->integer('employee_id');
            $table->foreign('employee_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_shifts');
    }
}
