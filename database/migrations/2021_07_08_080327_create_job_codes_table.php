<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_codes', function (Blueprint $table) {
            $table->integer('id','true');
            $table->integer('organisation_id');
            $table->foreign('organisation_id')->references('id')->on('organisations');
            $table->integer('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->string('name','32');
            $table->tinyInteger('pay_type')->default('0');
            $table->tinyInteger('exclude_from_over_time')->default('0');
            $table->tinyInteger('status')->default('1');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('job_codes');
    }
}
