<?php

namespace App\Models;

use App\Models\Franchise;

class Restaurant extends Franchise
{

	protected $fillable = [
        'longitude', 'latitude', 'price_range_identifier',
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
				if($this->tags->contains($value)) {
					$i++;
				}
		}
		return $i;
	}
}
