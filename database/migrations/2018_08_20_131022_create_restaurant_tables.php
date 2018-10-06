<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('address');
            $table->string('phone_number')->nullable();
            $table->longText('description')->nullable();
            $table->longText('logo_image')->nullable();
            $table->longText('restaurant_image')->nullable();
            $table->string('price_range_identifier')->nullable();
            $table->string('rating')->nullable();
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
        Schema::dropIfExists('restaurants');
    }
}
