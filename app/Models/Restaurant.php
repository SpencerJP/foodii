<?php

namespace App\Models;

use App\Models\Franchise;

class Restaurant extends Franchise
{

	protected $fillable = [
        'longitude', 'latitude', 'price_range_identifier', 'phone_number', 'logo_image', 'restaurant_image'
    ];
    /**
     *
     * @return the tags that this restaurant has
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'restaurant_tags');
    }

	public function result() {
      return $this->hasMany('App\Models\QuizResult');
  }

	public function countTags($tags) {
		$i = 0;
		foreach($tags as $key => $value) {
			if($value->type == "positive") {
				if($this->tags->contains($value)) {
					$i++;
				}
			}
			if($value->type == "negative") {
				if($this->tags->contains($value)) {
					return 0; // low priority
				}
			}

		}
		return $i;
	}

	public function getAverageRating() {

		$quizresults = QuizResult::all();
		$restaurant_id = $this->id;
		$sumOfRatings = 0;
		$totalRatings = 0;

		info("Array Count ". $quizresults->count());

		$quizresults = $quizresults->reject(function($value, $key) use($restaurant_id) {
			if ($value->restaurant_id == $restaurant_id) {
				return false;
			}
			else {
				return true;
			}
		});

		foreach ($quizresults as $key => $value) {
			if ($value->rating != null) {
				$totalRatings++;
				$sumOfRatings = $sumOfRatings + $value->rating;
			}
			info("Array Count ". $totalRatings . "" . $sumOfRatings);
		}

		if ($totalRatings == 0) {
			return -1;
		}

		return ($sumOfRatings / $totalRatings);
	}

	public function getRoundedRating() {
		$rating = $this->getAverageRating();

		if ($rating >= 1 && $rating < 1.5) {
			return 1;
		}
		elseif ($rating >= 1.5 && $rating < 2.5) {
			return 2;
		}
		elseif($rating >= 2.5 && $rating < 3.5) {
			return 3;
		}
		elseif($rating >= 3.5 && $rating < 4.5) {
			return 4;
		}
		elseif($rating >= 4.5) {
			return 5;
		}
		else {
			return -1;
		}
	}
}
