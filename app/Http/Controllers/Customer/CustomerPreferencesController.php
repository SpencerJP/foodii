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
        if ($preferences == null) {
          $preferences = new Preferences;
          $preferences->user_id = \Auth::user()->id;
          $preferences->save();
          \Auth::user()->preference_id = $preferences->id;
          return View::make('customer.index')->with('preferences', $preferences)->
          with('dietary_mode', [])->
          with('preferred_price_range', "")->
          with('preferred_radius_size', "");
        }
        if (json_decode($preferences->dietary_mode) == null){
          return View::make('customer.index')->with('preferences', $preferences)->
          with('dietary_mode', [])->
          with('preferred_price_range', "")->
          with('preferred_radius_size', "");
        }
        else {
          $dietary_mode=json_decode($preferences->dietary_mode);
          $preferred_price_range=$preferences->preferred_price_range;
          $preferred_radius_size=$preferences->preferred_radius_size;
          return View::make('customer.index')->with('preferences', $preferences)->
          with('dietary_mode', $dietary_mode)->
          with('preferred_price_range', $preferred_price_range)->
          with('preferred_radius_size', $preferred_radius_size);
        }
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
        info($id);
        if ($this->checkAuth()) {
            return redirect('/home');
        }
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
            return Redirect::to('customer')
                ->withErrors($validator);

        } else {
            // store
            $preferences1= Input::get('dietary_mode');
            $preferences2= Input::get('preferred_price_range');
            $preferences3= Input::get('preferred_radius_size');


            $preferences = \Auth::user()->preferences;

            $preferences->dietary_mode=json_encode($preferences1);
            $preferences->preferred_price_range= $preferences2;
            $preferences->preferred_radius_size= $preferences3;
            $preferences->save();

            // redirect

            return Redirect::to('customer');
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
