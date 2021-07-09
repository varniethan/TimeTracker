<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBreaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_breaks', function (Blueprint $table) {
//            N.B: This is trasfered to shift breaks
            $table->integer('id', true);
            $table->integer('break_id');
            $table->foreign('break_id')->references('id')->on('break_rules');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('hours');
            $table->integer('mins');
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
        Schema::dropIfExists('user_breaks');
    }
}
