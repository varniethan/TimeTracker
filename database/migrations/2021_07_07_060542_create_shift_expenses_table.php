<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_expenses', function (Blueprint $table) {
            $table->integer('id', 'true');
            $table->integer('shift_id'); //shift table needs to be created
            $table->foreign('shift_id')->references('id')->on('shifts');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('expense_category_id');
            $table->foreign('expense_category_id')->references('id')->on('expense_category');
            $table->timestamp('time')->nullable();
            $table->decimal('amount', 9, 3)->nullable();;
            $table->string('proof')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->text('description')->nullable();;
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
        Schema::dropIfExists('shift_expenses');
    }
}
