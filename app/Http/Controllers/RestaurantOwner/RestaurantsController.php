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
     *  Checks if they're authenticated correctly
     *  @return boolean they authenticated?
    */
    private function checkAuth() {
        if(\Auth::check() && !(\Auth::user()->isRestaurantOwner() || \Auth::user()->isAdmin()) ) {
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
        if (\Auth::check() && \Auth::user()->isAdmin()) {
          $restaurants = Restaurant::All();
          return View::make('restaurants.index')->with('restaurants', $restaurants);
        }
        else {
          $restaurants = \Auth::user()->restaurants;
          return View::make('restaurants.index')->with('restaurants', $restaurants);
        }
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
            'description' => 'required',
            'phone_number' => 'required'
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
            $restaurant->phone_number = Input::get('phone_number');
            $restaurant->logo_image = Input::get('logo_image');
            $restaurant->restaurant_image = Input::get('restaurant_image');
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
        
        // get the restaurant
        $restaurant = Restaurant::find($id);
        
        // show the edit form and pass the nerd
        return View::make('restaurants.edit')
        ->with('restaurant', $restaurant);
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
        $restaurant = Restaurant::find($id);
        //validate
        $rules = array(
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'phone_number' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        
        //process the login
        if ($validator->fails()){
            return Redirect::to('\restaurantowner\restaurants\edit')
                ->withErrors($validator);
        } else {
            //store
            $restaurant->name = Input::get('name');
            $restaurant->address = Input::get('address');
            $restaurant->description = Input::get('description');
            $restaurant->phone_number = Input::get('phone_number');
            $restaurant->logo_image = Input::get('logo_image');
            $restaurant->restaurant_image = Input::get('restaurant_image');
            $restaurant->save();
            
            //redirect
            return Redirect::to('\restaurantowner\restaurants');
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
        
        //delete the restaurant
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        
        //redirect to restaurants page
        //Session::flash('message', 'Restaurant deleted successfully!');
        return Redirect::to('\restaurantowner\restaurants');
    }
}
