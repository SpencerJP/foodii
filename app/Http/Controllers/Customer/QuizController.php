<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Tag;
class QuizController extends Controller
{

    public function index() {
      $quiz_id = $request->session()->get('activeQuiz', null);
      if ($quiz_id == null) {
      	return View::make('quiz.start');
      }
      else {
        $quiz = Quiz::find($quiz_id);
        if ($quiz == null) {
          return View::make('quiz.start');
        }
        else {
          $question = Question::find($quiz->idOfRecentQuestion)
          return View::make('quiz.displayquestion')->with('quiz', $quiz)->with('question', $question);
        }
      }
    }

    public function answerQuestion() {
        if((\Auth::check()) )) {
        }
        else {
          return redirect('/home');
        }

        $quiz_id = $request->session()->get('activeQuiz', null);
        $quiz = null;
        if ($quiz_id == null) {
        	$quiz = new Quiz;
          $quiz->save();
          $request->session()->set('activeQuiz', $quiz->id);
        }
        else {
          $quiz = Quiz::find($quiz_id);
          }
        }
        $answer =  Answer::find(Input::get('answer_id'));
        $tags = $answer->tags->get();
        foreach($tags as $key => $value) {
          $quiz->tags()->attach($key);
        }
        $quiz->processTags();
        //redirect
        return redirect()->action('Admin\TagsController@restaurantTagIndex', ['restaurant' => $restaurant]);
    }
}
