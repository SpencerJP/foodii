<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('questionvalue');
            $table->integer('weight')->nullable();
            $table->timestamps();
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answervalue');
            $table->integer('question_id')->nullable();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default("defaultTag");
            $table->string('type')->nullable();
            $table->timestamps();
        });

        Schema::create('answer_tags', function (Blueprint $table) {
            $table->integer('answer_id')->integer();
            $table->foreign('answer_id')->references('id')->on('answers');
            $table->integer('tag_id')->integer();
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->timestamps();
        });

        Schema::create('restaurant_tags', function (Blueprint $table) {
            $table->integer('restaurant_id')->integer();
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->integer('tag_id')->integer();
            $table->foreign('tag_id')->references('id')->on('tags');
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
        Schema::dropIfExists('restaurant_tags');
        Schema::dropIfExists('answer_tags');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('questions');
    }
}
