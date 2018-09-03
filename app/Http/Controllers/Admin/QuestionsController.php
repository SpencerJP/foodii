<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Question;

class QuestionsController extends Controller
{
    /**
        Checks if they're a logged in customer
    */
    private function checkAuth() {
        if(\Auth::check() && !(\Auth::user()->isAdmin()) ) {
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
        $questions = Question::All();
        return View::make('admin.question.index')->with('questions', $questions); // TODO
    }

    public function create()
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
         return View::make('admin.question.create');
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
            'questionvalue' => 'required',
            'impact' => 'required|numeric',
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
