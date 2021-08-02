<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 64)->unique();
            $table->string('display_name', 32);
            $table->string('sector');
            $table->integer('owner');
            //$table->foreign('owner')->references('id')->on('users');
            $table->integer('MD')->nullable();
            //$table->foreign('MD')->references('id')->on('users');
            $table->string('email', 64)->unique();
            $table->string('mobile_number', 13);
            $table->string('land_number', 13)->nullable();
            $table->string('website')->nullable();
            $table->string('address_1', 128);
            $table->string('address_2', 128)->nullable();
            $table->string('postal_code', 6);
            $table->double('latitude')->nullable();
            $table->double('longitde')->nullable();
            $table->double('city');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('organisation');
    }
}
