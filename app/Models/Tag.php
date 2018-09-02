<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{


	protected $fillable = [
		"name", "type"
	]
    /**
     * Tags
     *
     * @return restaurants that use this tag
     */
        public function restaurants()
    {
        return $this->belongsToMany('App\Models\Restaurant', 'restaurant_tags');
    }

    /**
     * Tags
     *
     * @return answers that use this tag
     */
        public function answers()
    {
        return $this->belongsToMany('App\Models\Answer', 'answer_tags');
    }
}
