<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('yeet', function () {
    $this->comment("yote");
})->describe('Display an yeet quote');


Artisan::command('testGetNextQuestion {quiz_id}', function ($quiz_id = null) {
  if ($quiz_id == null) {
    $quiz = new App\Models\Quiz;
    $nextQuestion = $quiz->getNextQuestion();
    if ($nextQuestion != null) {
      $this->comment($nextQuestion->questionvalue);
    }
  }
  else {
      $quiz = App\Models\Quiz::find($quiz_id);
      $nextQuestion = $quiz->getNextQuestion();
      if ($nextQuestion != null) {
        $this->comment($nextQuestion->questionvalue);
      }
  }

})->describe('Test getNextQuestion as part of the Quiz class');
