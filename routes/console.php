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


Artisan::command('testGetNextQuestion', function () {
      $quiz = App\Models\Quiz::find(1);
      if ($quiz == null) {
        $quiz = new App\Models\Quiz;
      }
      $nextQuestion = $quiz->getNextQuestion();
      if ($nextQuestion != null) {
        $comment = $quiz->questionsAnswered . ": " . $nextQuestion->questionvalue . ", questionCount: " . $quiz->questions->count();
        $this->comment($comment);
      }
      else {
        $this->comment("end");
        $quiz->questionsAnswered = 0;
        //$quiz->questions->destroy();
        $quiz->save();
      }

})->describe('Test getNextQuestion as part of the Quiz class');
