<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_shifts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_id');
            $table->foreign('organisation_id')->references('id')->on('organisations');
            $table->string('shift_name');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('number_of_employees_needed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_shifts');
    }
}
