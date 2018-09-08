<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Tag;

class AnswersController extends Controller
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
     * @param question id
     * @return \Illuminate\Http\Response
     */
    public function index(int $question_id)
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
        $question = Question::find($question_id);
        $answers = $question->answers();
   
        return View::make('admin.question.answer.index')->with('question', $question)->with('answers', $answers); // TODO
    }

    public function create($question_id)
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
        $question = Question::find($question_id);
         return View::make('admin.question.answer.create')->with('question', $question);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($question_id)
    {
    	if ($this->checkAuth()) {
            return redirect('/home');
        }
        //validate
        $rules = array(
            'answervalue' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        
        //process the login
        if ($validator->fails()){
            return Redirect::to("\admin\questions\\". $question_id . "\create")
                ->withErrors($validator);
        } else {
            //store
            $answer = new Answer;
            $answer->answervalue = Input::get('answervalue');
            $answer->question_id = $question_id;            
            $answer->save();
            //redirect
            return Redirect::to('\admin\questions\\' . $question_id);
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
     * @param  int  $id
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
