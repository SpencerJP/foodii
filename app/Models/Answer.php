<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

	protected $fillable = [
		"answervalue"
	];
	/**
     * Tags
     *
     * @return this answer's callback tags, must have at least 1
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'answer_tags');
    }

     /**
     * A profile belongs to a user.
     *
     * @return the user that this belongs to.
     */
    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

}
