<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Support\Facades\View;

class CustomerPreferencesController extends CustomerController
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::check() && !(\Auth::user()->isCustomer()) ) {
            return redirect('/home');
        }
        $preferences = \Auth::user()->preferences;
        return View::make('customer.index')->with('preferences', $preferences); // TODO
    }
}
