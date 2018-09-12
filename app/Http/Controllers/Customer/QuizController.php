<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    public $activeQuiz = false;

    public function index() {
    	return View::make('quiz.start');
    }

    public function startQuiz() {

    }
}
