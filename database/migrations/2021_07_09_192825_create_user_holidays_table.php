<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userHoliday', function (Blueprint $table) {
            $table->integer('id', 'true');
            $table->integer('holiday_type_id');
            $table->foreign('holiday_type_id')->references('id')->on('holiday_types');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('date');
            $table->integer('no_of_hours');
            $table->integer('no_of_mins');
            $table->text('notes')->nullable();;
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('userHoliday');
    }
}
