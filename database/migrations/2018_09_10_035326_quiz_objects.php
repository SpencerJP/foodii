<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuizObjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('quizzes', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('questionsAnswered')->nullable();
          $table->integer('idOfRecentQuestion')->nullable();
          $table->integer('quizresult_id')->integer()->nullable();
          $table->foreign('quizresult_id')->references('id')->on('quiz_results');
          $table->timestamps();
      });

      Schema::create('quiz_questions', function (Blueprint $table) {
          $table->integer('quiz_id')->integer();
          $table->foreign('quiz_id')->references('id')->on('quizzes');
          $table->integer('question_id')->integer();
          $table->foreign('question_id')->references('id')->on('questions');
          $table->timestamps();
      });

      Schema::create('quiz_tags', function (Blueprint $table) {
          $table->integer('quiz_id')->integer();
          $table->foreign('quiz_id')->references('id')->on('quizzes');
          $table->integer('tag_id')->integer();
          $table->foreign('tag_id')->references('id')->on('tags');
          $table->timestamps();
      });

      Schema::create('quiz_potential_restaurants', function (Blueprint $table) {
          $table->integer('quiz_id')->integer();
          $table->foreign('quiz_id')->references('id')->on('quizzes');
          $table->integer('restaurant_id')->integer();
          $table->foreign('restaurant_id')->references('id')->on('restaurants');
          $table->timestamps();
      });

      Schema::create('quiz_removed_restaurants', function (Blueprint $table) {
          $table->integer('quiz_id')->integer();
          $table->foreign('quiz_id')->references('id')->on('quizzes');
          $table->integer('restaurant_id')->integer();
          $table->foreign('restaurant_id')->references('id')->on('restaurants');
          $table->timestamps();
      });

      Schema::create('quizresults', function(Blueprint $table) {
        $table->increments('id');
        $table->integer("voteResult")->nullable();
        $table->integer('quiz_id')->integer();
        $table->foreign('quiz_id')->references('id')->on('quizzes');
        $table->integer('user_id')->integer();
        $table->foreign('user_id')->references('id')->on('users');
        $table->integer('restaurant_id')->integer();
        $table->foreign('restaurant_id')->references('id')->on('restaurants');
        $table->integer('rating')->integer();
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
      Schema::dropIfExists('quizzes');
      Schema::dropIfExists('quiz_questions');
      Schema::dropIfExists('quiz_tags');
      Schema::dropIfExists('quiz_potential_restaurants');
      Schema::dropIfExists('quiz_removed_restaurants');
      Schema::dropIfExists('quizresults');
    }
}
