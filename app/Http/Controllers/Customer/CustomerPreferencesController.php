<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Preferences;
use App\Models\User;

class CustomerPreferencesController extends CustomerController
{


    /**
        Checks if they're a logged in customer
    */
    private function checkAuth() {
        if(\Auth::check() && !(\Auth::user()->isCustomer()) ) {
           return true;
        }
        return false;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
        $preferences = \Auth::user()->preferences;
        return View::make('customer.index')->with('preferences', $preferences); // TODO
    }

    public function create()
    {
        if (checkAuth()) {
            return redirect('/home');
        }
         return View::make('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if (checkAuth()) {
            return redirect('/home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id -- does nothing, just required for laravel to find the route
     * @return Response
     */
    public function update($id)
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
        $preferences = \Auth::user()->preferences;
         $rules = array(
            'dietary_mode'               => 'required',
            'preferred_price_range'      => 'required',
            'preferred_radius_size'      => 'required'
        );
         /* TODO  Make a proper validator http://laravel.com/docs/validation
         */
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('customer.index')
                ->withErrors($validator)
                ->withInput(Input);
        } else {
            // store
            $preferences1= Input::get('dietary_mode');
            $preferences2= Input::get('preferred_price_range');
            $preferences3= Input::get('preferred_radius_size');



            $preferences->dietary_mode=json_encode($preferences1);
            $preferences->preferred_price_range=json_encode($preferences2);
            $preferences->preferred_radius_size=json_encode($preferences3);
            $preferences->save();

            info($preferences);

            $dietary_mode->preferences=json_decode($preferences1);
            $preferred_price_range->preferences=json_decode($preferences2);
            $preferred_radius_size->preferences=json_decode($preferences3);


            
            // redirect
            return Redirect::to('\customer\preferences');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if (checkAuth()) {
            return redirect('/home');
        }
    }
}
