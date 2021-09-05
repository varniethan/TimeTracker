<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('user_name')->unique();
            $table->string('password');
            $table->string('email', 64)->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->tinyInteger('gender');
            $table->string('mobile_number')->unique();
            $table->string('land_number')->nullable();;
            $table->string('post_code');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->mediumInteger('city',false, true);
//            $table->foreign('city')->references('id')->on('cities');
            $table->string('ni_number');
            $table->Integer('position_id'); #Position is organisation specific
            $table->foreign('position_id')->references('id')->on('positions');
            $table->integer('role_id');
            $table->foreign('role_id')->references('id')->on('roles'); #role is app specific
            $table->float('basic_salary')->nullable();
            $table->float('hourly_rate')->nullable();
            $table->integer('organisation_id')->nullable();
//            $table->foreign('organisation_id')->references('id')->on('organisations');
            $table->tinyInteger('status')->default('1');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('created_by')->nullable();
//            $table->foreign('created_by')->references('id')->on('users');
           $table->integer('updated_by')->nullable();
//            $table->foreign('updated_by')->references('id')->on('users');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
