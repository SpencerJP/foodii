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
}
