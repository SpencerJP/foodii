<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use App\Models\Question;
use App\Models\Tag;

class Quiz extends Model
{

  protected $fillable = [
    'questionsAnswered', 'idOfRecentQuestion'
  ];

	public function result()
	{
		return $this->hasOne("App\Models\QuizResult");
	}

	public function questions() {
		return $this->belongsToMany("App\Models\Question", "quiz_questions");
	}

	public function tags() {
		return $this->belongsToMany("App\Models\Tag", "quiz_tags");
	}

	public function getNextQuestion($user = null) {
    $weightFactor = rand(1,5); // generate a random number to vary the question weights
		if ($this->questionsAnswered < Config::get('quizoptions.quiz_question_max')) {
      while(true) {
        $localQuestions = Question::All()->where('weight', '>=', $weightFactor);
        foreach($this->questions as $key => $value) {
          $localQuestions = $localQuestions->where('id', '!=', $key);
        }
        if ($localQuestions->count() == 0) {
          if ($weightFactor == 0) {
            return null;
          }
          $weightFactor--;
          continue;
        }
        if ($user != null) {


          $localQuestions->where('questionvalue', '!=', "preferences");
        }
        $questionToReturn = $localQuestions->random();
        if ($this->questionsAnswered == null) {
          $this->questionsAnswered = 1;
        }
        else {
            $this->questionsAnswered = $this->questionsAnswered + 1;
        }
        $this->save();
        $this->questions()->attach($questionToReturn);
        $this->idOfRecentQuestion = $questionToReturn->id;
        $this->save();
        return $questionToReturn;
      }

		}
    else {
      return null;
    }
	}

  public function checkForResult() {
    if ((Question::All()->count() - $this->questions->count()) <= Config::get('quizoptions.restaurant_pool_size')) {
      $q;
      while(true) {
        $q = Question::All()->random(1);
        if ($this->questions->get()->contains($q)) {
          continue;
        }
        else {
          return $q;
        }
      }
      return null;

    }
  }
}
