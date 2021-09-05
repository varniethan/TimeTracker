<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_managers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->integer('branch_manager_id');
            $table->foreign('branch_manager_id')->references('id')->on('users') ;
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('branch_managers');
    }
}
