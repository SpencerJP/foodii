<?php

namespace App\Http\Controllers\Customer;


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
        return view('testview'); // TODO
    }
}
