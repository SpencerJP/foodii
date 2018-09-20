<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{

    protected $table = 'quizresults';
    
    protected $fillable = [
    	'voteResult',
    ];

    public function quiz() {
      return $this->belongsTo('App\Models\Quiz');
    }
    public function user()
    {
        return $this->hasOne("App\Models\User");
    }

    public function restaurant()
    {
        return $this->hasOne("App\Models\Restaurant");
    }
}
