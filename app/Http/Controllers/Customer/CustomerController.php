<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

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
        $restaurants = \Auth::user()->restaurants;
        return View::make('customer.index')->with('restaurants', $restaurants);
    }
}
