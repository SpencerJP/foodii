<?php

namespace App\Http\Controllers\RestaurantOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Models\Restaurant;

class RestaurantsController extends Controller
{
    
    /**
        Checks if they're a logged in customer
    */
    private function checkAuth() {
        if(\Auth::check() && !(\Auth::user()->isRestaurantOwner()) ) {
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
        $restaurants = \Auth::user()->restaurants;
        return View::make('restaurants.index')->with('restaurants', $restaurants); // TODO
    }

    public function create()
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
         return View::make('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if ($this->checkAuth()) {
            return redirect('/home');            
        }
        
        //validate
        $rules = array(
            'name' => 'required',
            'address' => 'required',
            'description' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        
        //process the login
        if ($validator->fails()){
            return Redirect::to('\restaurantowner\restaurants\create')
                ->withErrors($validator);
        } else {
            //store
            $restaurant = new Restaurant;
            $restaurant->name = Input::get('name');
            $restaurant->address = Input::get('address');
            $restaurant->description = Input::get('description');
            $restaurant->rating = rand(1,5);
            $restaurant->user_id = \Auth::user()->id;
            $restaurant->save();
            
            //redirect
            return Redirect::to('\restaurantowner\restaurants');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
        
        // Get the restaurant
        $restaurant = Restaurant::find($id);
        
        return View::make('restaurants.show')
            ->with('restaurant', $restaurant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    	if ($this->checkAuth()) {
            return redirect('/home');
        }
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
            'dietary_mode'       => 'required',
            'preferred_price_range'      => 'required',
            'preferred_radius_size' => 'required'
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
            $preferences->dietary_mode       = Input::get('dietary_mode');
            $preferences->preferred_price_range      = Input::get('preferred_price_range');
            $preferences->preferred_radius_size = Input::get('preferred_radius_size');
            $preferences->save();

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
        if ($this->checkAuth()) {
            return redirect('/home');
        }
    }
}
