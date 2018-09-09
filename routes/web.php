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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'Admin\AdminController@index')->name('admindashboard');


Route::get('/restaurantowner', 'RestaurantOwner\RestaurantOwnerController@index')->name('restaurantownerdashboard');


Route::get('/customer', 'Customer\CustomerController@index')->name('dashboard');

Route::resource('restaurants', 'RestaurantOwner\RestaurantsController');
Route::get('restaurants/{restaurant_id}/viewtags', 'Admin\TagsController@restaurantTagIndex')->name('tags.restaurantTagIndex');
Route::get('restaurants/{restaurant_id}/addtag/{tag_id}', 'Admin\TagsController@addTagRestaurant')->name('tags.addTagRestaurant');
Route::get('restaurants/{restaurant_id}/removetag/{tag_id}', 'Admin\TagsController@removeTagRestaurant')->name('answers.removeTagRestaurant');


Route::resource('preferences', 'Customer\CustomerPreferencesController')->only([
    'index', 'update'
]);

Route::resource('questions', 'Admin\QuestionsController')->only(['index', 'create', 'store', 'destroy']);


 // routes for AnswersController (modified resource controller)
Route::get('questions/{question_id}', 'Admin\AnswersController@index')->name('answers.index'); // overrides  questions resource
Route::get('questions/{question_id}/create', 'Admin\AnswersController@create')->name('answers.create');
Route::post('questions/{question_id}', 'Admin\AnswersController@store')->name('answers.store');
//Route::get('/admin/questions/{question_id}/{answer_id}', 'Admin\AnswersController@show')->name('answers.show');
Route::get('questions/{question_id}/{answer_id}', 'Admin\TagsController@answerTagIndex')->name('tags.answerTagIndex');
Route::get('questions/{question_id}/{answer_id}/edit', 'Admin\AnswersController@edit')->name('answers.edit');
Route::put('questions/{question_id}/{answer_id}/update', 'Admin\AnswersController@update')->name('answers.update');
Route::get('questions/{question_id}/{answer_id}/addtag/{tag_id}', 'Admin\TagsController@addTagAnswer')->name('tags.addTagAnswer');
Route::get('questions/{question_id}/{answer_id}/removetag/{tag_id}', 'Admin\TagsController@removeTagAnswer')->name('answers.removeTagAnswer');
Route::delete('questions/{question_id}/{answer_id}/destroy', 'Admin\AnswersController@destroy')->name('answers.destroy');

Route::resource('users', 'Admin\UsersController');
