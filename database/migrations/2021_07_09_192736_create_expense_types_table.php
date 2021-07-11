<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenseType', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_id');
            $table->foreign('organisation_id')->references('id')->on('organisation');
            $table->string('name', 64)->unique();
            $table->text('description')->nullable();
            $table->decimal('maximum_amount', 9, 3);
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
        Schema::dropIfExists('expenseType');
    }
}
