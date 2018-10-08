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
        /*
        if ($user != null) {
          $localQuestions->where('questionvalue', '!=', "preferences");
        } */
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
      //info("checkForResult: Hit maximum questions.");
      $count_for_log = 0;
      $r = $this->potentialRestaurants;
      //info("checkForResult: Removed " . $count_for_log . " restaurants from potentialRestaurants because they were in removedRestaurants.");
      $r = $r->sort(function($a, $b) {
                if ($a->countTags($this->tags) == $b->countTags($this->tags) ) {
                  return 0;
                }
                return ($a->countTags($this->tags) < $b->countTags($this->tags)) ? 1 : -1;
      });
      //info("checkForResult: Sorting restaurants array with " . $r->count() . " potential restaurants.");
      //info("checkForResult: Printing sorted restaurant array    " . $r);
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
    if (($this->potentialRestaurants->count()+$this->removedRestaurants->count()) <= Config::get('quizoptions.restaurant_pool_size')) {
      //info("checkForResult: Have enough restaurants in my pool.");
      $count_for_log = 0;
      $r = $this->potentialRestaurants->reject(function ($value) {
        if ($this->removedRestaurants->contains($key)) {
          $count_for_log++;
          return true;
        }
        else {
          return false;
        }
      });
      //info("checkForResult: Removed " . $count_for_log . " restaurants from potentialRestaurants because they were in removedRestaurants.");
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
    $restaurants = Restaurant::All()->reject(function ($value, $key) {
      //info("processTags(): checking " . $value->name . " for removal");
      if ($this->removedRestaurants->contains($value)) {
        //info("processTags(): removing " . $value->name);
        return true;
      }
      if ($this->potentialRestaurants->contains($value)) {
        //info("processTags(): removing " . $value->name);
        return true;
      }
      return false;
    });

    foreach($this->tags as $tagkey => $quiztag) {
      foreach($restaurants as $restaurantkey => $restaurant) {
        if($quiztag->type == "negative") {
            if( $restaurant->tags->contains($quiztag) )  {
                //info("Removing id=" . $restaurant->id . ": " . $restaurant->name . " because of the tag " . $quiztag->name);
              $this->removedRestaurants()->attach($restaurant->id);
              if($this->potentialRestaurants->contains($restaurant)) {
                $this->potentialRestaurants()->detach($restaurant->id);
              }
              $restaurants->forget($restaurantkey);
            }
        }
        else {
            if( $restaurant->tags->contains($quiztag) ) {
                //info("Attaching id=" . $restaurant->id . ": " . $restaurant->name . " because of the tag " . $quiztag->name);
              $this->potentialRestaurants()->attach($restaurant->id);
              $restaurants->forget($restaurantkey);
            }
        }
      }

      foreach($this->potentialRestaurants as $restaurantkey => $restaurant) {
        if ($restaurant->countTags($this->tags) == 0) {
          //info("Removing id= " . $restaurant->id . ": " . $restaurant->name . " because it has negative tags");
          $this->removedRestaurants()->attach($restaurant->id);
          $this->potentialRestaurants()->detach($restaurant->id);

        }
      }
    }
    $this->save();
  }
}
