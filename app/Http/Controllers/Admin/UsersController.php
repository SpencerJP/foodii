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
        
        return View::make('admin.users.show')
        ->with('user', $user);
    }
}
