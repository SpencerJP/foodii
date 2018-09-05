<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


    Note to my group members - 
    These are the "links" of our application. Run 'php artisan route:list' to see a comprehensive full list of routes.
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*

// spencer note, copied this here from the source code. These are called in Auth::routes so they apply to our application, and are all valid links

 public function auth()
    {
        // Authentication Routes...
        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');
    }

*/

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'Admin\AdminController@index')->name('admindashboard');


Route::get('/restaurantowner', 'RestaurantOwner\RestaurantOwnerController@index')->name('restaurantownerdashboard');


Route::get('/customer', 'Customer\CustomerController@index')->name('dashboard');	

Route::resource('/restaurantowner/restaurants', 'RestaurantOwner\RestaurantsController');

Route::resource('/customer/preferences', 'Customer\CustomerPreferencesController')->only([
    'index', 'update'
]);

Route::resource('/admin/questions', 'Admin\QuestionsController')->only(['index', 'create', 'store', 'destroy']);
 

 // routes for AnswersController (modified resource controller)
Route::get('/admin/questions/{question_id}', 'Admin\AnswersController@index')->name('answers.index'); // overrides  questions resource
Route::get('/admin/questions/{question_id}/create', 'Admin\AnswersController@create')->name('answers.create');
Route::post('/admin/questions/{question_id}', 'Admin\AnswersController@store')->name('answers.store');
Route::get('/admin/questions/{question_id}/{answer_id}', 'Admin\AnswersController@show')->name('answers.show');
Route::get('/admin/questions/{question_id}/{answer_id}/edit', 'Admin\AnswersController@edit')->name('answers.edit');
Route::put('/admin/questions/{question_id}/{answer_id}/update', 'Admin\AnswersController@update')->name('answers.update');
Route::delete('/admin/questions/{question_id}/{answer_id}/destroy', 'Admin\AnswersController@destroy')->name('answers.destroy');