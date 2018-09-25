<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Tag;
use App\Models\Restaurant;
class QuizController extends Controller
{

    public function index(Request $request) {
      $quiz_id = $request->session()->get('activeQuiz', null);
      if ($quiz_id == null) {
      	return View::make('quiz.startquiz');
      }
      else {
        $quiz = Quiz::find($quiz_id);
        if ($quiz == null) {
          return View::make('quiz.startquiz');
        }
        else {
          if ($quiz->checkForResult(\Auth::user()->id) != null)  {
            $result = $quiz->checkForResult(\Auth::user()->id);
            $quiz->save();
            return View::make('quiz.resultpage')->with('quizresult', $result)->with('quiz', $quiz);
          }
          $currentQuestion = $request->session()->get('activeQuestion', null);

          if ($currentQuestion == null) {
            $question = $quiz->getNextQuestion();
            $request->session()->put('activeQuestion', $question->id);
          }
          else {
            $question = Question::find($currentQuestion);
            if ($question == null) {
                $request->session()->put('activeQuestionHasBeenAnswered', null);
                $question = $quiz->getNextQuestion();
            }
          }
          return View::make('quiz.question')->with('quiz', $quiz)->with('question', $question);
        }
      }
    }

    public function startQuiz(Request $request) {
        $quiz = new Quiz;
        $quiz->save();
        $request->session()->put('activeQuiz', $quiz->id);
      return redirect()->action('Customer\QuizController@index');
    }

    public function answerQuestion(Request $request) {
        if ($request->session()->get('activeQuestion', null) == null) {
          return redirect()->action('Customer\QuizController@index');
        }
        $quiz_id = $request->session()->get('activeQuiz', null);
        $quiz = null;
        if ($quiz_id == null) {
        	$quiz = new Quiz;
          $quiz->save();
          $request->session()->put('activeQuiz', $quiz->id);
        }
        else {
          $quiz = Quiz::find($quiz_id);
        }
        $answer = Answer::find(Input::get('answer_id'));
        $tags = $answer->tags;
        //$this->log($tags);

        foreach($tags as $key => $value) {
          $this->log("Attaching " . $value->name);
          $quiz->tags()->attach($value->id);
        }
        $quiz->save();
        $quiz->processTags();
        $quiz->save();

        $result = $quiz->checkForResult(\Auth::user()->id);
        $quiz->save();

        if ($result != null) {

          $request->session()->put('activeQuestion', null);
          return View::make('quiz.resultpage')->with('quizresult', $result)->with('quiz', $quiz);
        }
        //redirect

        $request->session()->put('activeQuestion', null);
        return redirect()->action('Customer\QuizController@index');
    }

    public function destroy(Request $request) {
      if( !Config::get('quizoptions.debug_mode')) {
        if ($quiz->checkForResult(\Auth::user()->id) != null)  {
          $result = $quiz->checkForResult(\Auth::user()->id);
          $quiz->save();
          return View::make('quiz.resultpage')->with('quizresult', $result)->with('quiz', $quiz);
        }
      }
      else {
        $request->session()->forget('activeQuiz');
        $request->session()->forget('activeQuestionHasBeenAnswered');
        return View::make('quiz.startquiz');
      }
    }

    private function log($stringToLog) {
      info("QuizController: " . $stringToLog);
    }
}
