<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    
    private function checkAuth() {
    if(\Auth::check() && !(\Auth::user()->isAdmin()) ) {
        return true;
    }
    return false;
    }
    
    public function index()
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
        
        $users = User::All();
        return View::make('admin.users.index')->with('users', $users);
    }
    
    public function show($id)
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
        
        // Get the restaurant
        $user = User::find($id);
        
        $restaurants = $user->restaurants;
        
        if($user->isRestaurantOwner())
        {
            return View::make('admin.users.showro')
            ->with('user', $user)->with('restaurants', $restaurants);
        }
        else {
            return View::make('admin.users.show')
            ->with('user', $user);
        }
        
        
    }
    
    public function edit($id)
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
        
        // get the restaurant
        $user = User::find($id);
        
        // show the edit form and pass the nerd
        return View::make('admin.users.edit')
        ->with('user', $user);
    }
    
    public function update($id)
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
        $user = User::find($id);
        $preferences = $user->preferences;
        $rules = array(
            'dietary_mode'              => 'required',
            'preferred_price_range'     => 'required',
            'preferred_radius_size'     => 'required'
        );
        /* TODO  Make a proper validator http://laravel.com/docs/validation
         */
        $validator = Validator::make(Input::all(), $rules);
        
        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin\users\edit')
            ->withErrors($validator)
            ->withInput(Input);
        } else {
            // store
            
            $user->user_type                        = Input::get('user_type');       
            $preferences->dietary_mode              = Input::get('dietary_mode');
            $preferences->preferred_price_range     = Input::get('preferred_price_range');
            $preferences->preferred_radius_size     = Input::get('preferred_radius_size');
            $preferences->save();
            $user->save();
            
            // redirect
            return Redirect::to('admin\users');
        }
    }
    
    public function destroy($id)
    {
        //delete
        $user = User::find($id);
        $user->delete();
        
        //redirect
        return Redirect::to('admin\users');
        
        
    }
    
    
    
}
