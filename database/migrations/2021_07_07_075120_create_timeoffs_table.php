<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeoffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeoffs', function (Blueprint $table) {
            $table->integer('id',);
            $table->integer('organisation_id');
            $table->foreign('organisation_id')->references('id')->on('organisations');
            $table->string('name', '32');
            $table->text('description')->nullable();;
            $table->tinyInteger('is_payed');
            $table->decimal('payrate', 9, 2)->nullable();;
            $table->tinyInteger('status')->default('1');
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('timeoffs');
    }
}
