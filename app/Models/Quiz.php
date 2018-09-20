<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use App\Models\Question;
use App\Models\Tag;
use App\Models\Restaurant;
use App\Models\QuizResult;

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

  // these are restaurants to be in the final pool
  public function potentialRestaurants() {
    return $this->belongsToMany("App\Models\Restaurant", "quiz_potential_restaurants");
  }

  // these are restaurants that WILL NOT be part of the final result, aka "ruled out"
  public function removedRestaurants() {
    return $this->belongsToMany("App\Models\Restaurant", "quiz_removed_restaurants");
  }

	public function getNextQuestion($user = null) {
    $weightFactor = rand(1,5); // generate a random number to vary the question weights
		if ($this->questionsAnswered < Config::get('quizoptions.quiz_question_max')) {
      while(true) {
        $localQuestions = Question::All()->where('weight', '>=', $weightFactor);
        // prevent you from getting the same question twice
        $localQuestions = $localQuestions->reject(function($value, $key) {
          if ($this->questions->contains($value)) {
            return true;
          }
          else {
            return false;
          }
        });
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
        $this->questions()->attach($questionToReturn->id);
        $this->idOfRecentQuestion = $questionToReturn->id;
        $this->save();
        return $questionToReturn;
      }

		}
    else {
      return null;
    }
	}

  public function checkForResult($user_id) {
    if ($this->result != null) {
      return $this->result;
    }
    if ($this->questionsAnswered >= Config::get('quizoptions.quiz_question_max')) {
      $r = Restaurant::All()->reject(function ($value, $key) {
        if ($this->removedRestaurants->contains($key)) {
          return true;
        }
        else {
          return false;
        }
      });
      $r->sort(function($a, $b) {
                if ($a->countTags($this->tags) == $b->countTags($this->tags) ) {
                  return 0;
                }
                return ($a->countTags($this->tags) < $b->countTags($this->tags)) ? -1 : 1;
      });

      if($r->count() > 0) {
        $r = $r->first();
      } else {
        return null;
      }
      if ($r == null) {
        return null;
      }
      $quizresult = new QuizResult;
      $quizresult->restaurant_id = $r->id;
      $quizresult->user_id = $user_id;
      $quizresult->quiz_id = $this->id;
      $quizresult->save();
      $this->quizresult_id = $quizresult->id;
      $this->save();
      return $quizresult;
    }
    if ($this->potentialRestaurants->count() <= Config::get('quizoptions.restaurant_pool_size')) {
      $r = $this->potentialRestaurants->reject(function ($value, $key) {
        if ($this->removedRestaurants->contains($key)) {
          return true;
        }
        else {
          return false;
        }
      });
      if($r->count() > 0) {
        $r = $r->random(1)->first();
      } else {
        return null;
      }
      if ($r == null) {
        return null;
      }
      $quizresult = new QuizResult;
      $quizresult->restaurant_id = $r->id;
      $quizresult->user_id = $user_id;
      $quizresult->quiz_id = $this->id;
      $quizresult->save();
      $this->quizresult_id = $quizresult->id;
      $this->save();
      return $quizresult;

    }
  }

  public function processTags() {
    foreach($this->tags as $tagkey => $quiztag) {
      $restaurants = Restaurant::All()->reject(function ($value, $key) {
        if ($this->removedRestaurants->contains($key)) {
          return true;
        }
        if ($this->potentialRestaurants->contains($key)) {
          return true;
        }
        return false;
      });
      foreach($restaurants as $restaurantkey => $restaurant) {
        if($quiztag->type == "negative") {
            if( !$restaurant->tags->contains($tagkey) )  {
                //info("Removing " . $restaurant->name . " because of the tag " . $quiztag->name);
              $this->removedRestaurants()->attach($restaurantkey);
            }
        }
        else {
            if( $restaurant->tags->contains($tagkey) ) {
              //info("Attaching " . $restaurant->name . " because of the tag " . $quiztag->name);
              $this->potentialRestaurants()->attach($restaurantkey);
            }
        }
      }
    }
    $this->save();
  }
}
