<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use App\Models\Question;
use App\Models\Tag;
use App\Models\Restaurant;

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

  // these are restaurants that WILL NOT be part of the final result, aka "ruled out"
  public function restaurants() {
    return $this->belongsToMany("App\Models\Restaurant", "quiz_restaurants");
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
    if ((Restaurant::All()->count() - $this->restaurants->count()) <= Config::get('quizoptions.restaurant_pool_size')) {
      $q;
      $i = 0;
      $exit = (Restaurant::All()->count() - $this->restaurants->count());
      while(true) {
        $q = Restaurant::All()->except($this->restaurants->get())->random(1);
        if ($this->restaurants->get()->contains($q)) {

          $i++;

          if ($i == $exit) {
            return null;
          }
          continue;
        }
        else {
          return $q;
        }
      }

    }
  }

  public function processTags() {
    foreach($this->tags as $tagkey => $quiztag) {
      $restaurants = Restaurant::All()->except($this->restaurants->get());
      foreach($restaurants as $restaurantkey => $restaurant) {
          if($restaurant->tags()->contains($tagkey)) {
            $this->attach($restaurantkey);
          }
      }
    }
  }
}
