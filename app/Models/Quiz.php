<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{


    protected $fillable = [
      "result",
    ] // can't think of anything yet
    public $questionPool;
    public $tagPool;

    public function __construct() {
            parent::__construct();
            $questionPool = App\Models\Question::All();
            $tagPool;

        }

    public function getNextQuestion() {

    }

    public function user() {
        return $this->hasOne("App\Models\User");
    }

    public function restaurant() {
        return $this->hasOne("App\Models\Restaurant");
    }
}
