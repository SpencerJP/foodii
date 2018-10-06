<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     * questionvalue: the actual question, as a String (no answers)
     * weight: the "importance" of this question, the order is slightly different every time
     *  but higher weights will be prioritized by the randomizer. Value of 1-5, 5 is high priority, 1 is ask last. Most questions should be 3.
     * @var array
     */
    protected $fillable = [
        'questionvalue', 'weight',
    ];

    /**
     * Answers
     *
     * @return this question's answers, must have 2+
     */
    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function quizzes()
    {
      return $this->belongsToMany('App\Models\Quiz');
    }
}
