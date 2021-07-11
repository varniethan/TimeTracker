<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->integer('organisation');
            $table->foreign('organisation')->references('id')->on('organisation');
            $table->text('description');
            $table->tinyInteger('status');
            $table->float('basic_salary');
            $table->float('overtime');
            $table->integer('created_by')->nullable();
            //$table->foreign('created_by')->references('id')->on('users');
            $table->integer('updated_by')->nullable();
            //$table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('positions');
    }
}
