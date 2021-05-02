<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ColumnDefinition;
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
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email', 64)->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->tinyInteger('gender');
            $table->string('mobile_number')->unique();
            $table->string('land_number')->nullable();;
            $table->string('postal_code');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->mediumInteger('city',false, true);
            $table->foreign('city')->references('id')->on('cities');
            $table->string('ni_number');
            $table->Integer('position');
            $table->foreign('position')->references('id')->on('positions');
            $table->float('basic_salary')->nullable();
            $table->float('hourly_rate')->nullable();
            $table->integer('branch')->nullable();
            $table->integer('role');
            $table->foreign('role')->references('id')->on('roles');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
