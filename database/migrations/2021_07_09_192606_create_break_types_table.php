<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreakTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('break_types', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_id');
            $table->foreign('organisation_id')->references('id')->on('organisation');
            $table->string('name', 64)->unique();
            $table->string('description', 256)->nullable();
            $table->smallInteger('type');
            $table->integer('hours');
            $table->integer('mins');
            $table->smallInteger('can_end_earlier')->default('0')->nullable();
            $table->smallInteger('send_reminder')->default('0')->nullable();
            $table->smallInteger('prompt_when_hrs')->default('0')->nullable();
            $table->smallInteger('prompt_when_mins')->default('0')->nullable();
            $table->smallInteger('status')->default('1')->nullable();
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
        Schema::dropIfExists('break_types');
    }
}
