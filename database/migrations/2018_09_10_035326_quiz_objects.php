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
    }
}
