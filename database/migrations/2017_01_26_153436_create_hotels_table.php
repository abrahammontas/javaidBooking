<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->integer('city_id');
            $table->integer('zip_code');
            $table->integer('state_id');
            $table->integer('rating');
            $table->string('email');
            $table->string('phone');
            $table->time('check_in');
            $table->time('check_out');
            $table->time('early_check_in');
            $table->time('late_check_in');
            $table->string('description');

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
        Schema::drop('hotels');
    }
}
