<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Tag;

class Quiz extends Model
{

  protected $fillable = [
    'questionsAnswered'
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
		if ($this->questionsAnswered < 5) {
      while(true) {
        $localQuestions = Question::All()->where('weight', '>=', $weightFactor);
        foreach($this->questions as $key => $value) {
          $localQuestions->where('id', '!=', $key);
        }
        if ($localQuestions->count() == 0) {
`          $weightFactor--;
`          continue;
        }
        if ($user != null) {


          $localQuestions->where('questionvalue', '!=', "preferences");
        }
        $questionToReturn = $localQuestions->random();
        if ($this->questionsAnswered == null) {
          $this->questionsAnswered = 0;
        }
        else {
          $questionsAnswered++;
        }
        $this->save();
        $this->questions()->attach($questionToReturn);
        $this->save();

        return $questionToReturn;
      }

		}
    else {
      return null
    }
	}
}
