<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{


    protected $fillable = [

    ] // can't think of anything yet
    $questionPool;
    $tagPool;
    public function __construct() {
            parent::__construct();
            print "In SubClass constructor\n";
        }

    public function getNextQuestion() {

    }
}
