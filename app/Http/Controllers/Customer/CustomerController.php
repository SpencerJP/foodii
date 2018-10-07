<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\QuizResult;
use App\Models\Restaurant;
use App\Models\User;

class CustomerController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    private function checkAuth() {
        if(\Auth::check() && !(\Auth::user()->isCustomer()) ) {
            return true;
        }
        return false;
    }


    public function index()
    {
        $user_id = \Auth::user()->id;
        $quizresults = QuizResult::all();
        $quizresults = $quizresults->reject(function($value, $key) use ($user_id) {
          if ($value->user_id == $user_id) {
            return false;
          }
          else {
            return true;
          }
        });


        //$quizresult = $result->restaurant;

        /*$quizresult = QuizResult::select('restaurants.*')
                      ->join('restaurants', 'restaurants.id', '=', 'quizresults.restaurant_id')
                      ->where('quizresults.user_id','=', \Auth::user()->id)
                      ->get();*/

        return View::make('customer.index')->with('quizresults', $quizresults);
    }

    public function rate(Request $request)
    {
      //$quizresult =

      $rating = Input::post('rating');

      return Redirect::to('/customer');

    }
}
