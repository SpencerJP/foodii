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
            'weight' => 'required|numeric',
        );
        $validator = Validator::make(Input::all(), $rules);
        
        //process the login
        if ($validator->fails()){
            return Redirect::to('\admin\questions\create')
                ->withErrors($validator);
        } else {
            //store
            $question = new Question;
            $question->questionvalue = Input::get('questionvalue');
            $question->weight = Input::get('weight');
            $question->save();
            
            //redirect
            return Redirect::to('\admin\questions');
        }
    }

    public function destroy($id)
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
    }
}
