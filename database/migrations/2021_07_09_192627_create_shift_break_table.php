<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftBreakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_break', function (Blueprint $table) {
            $table->integer('id', 'true');
            $table->integer('shift_id');
            $table->foreign('shift_id')->references('id')->on('shift');
            $table->integer('break_type_id');
            $table->foreign('break_type_id')->references('id')->on('break_types');
            $table->time('start');
            $table->time('end');
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
        Schema::dropIfExists('shift_break');
    }
}
