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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'Admin\AdminController@index')->name('admindashboard');

Route::get('/restaurantowner', 'RestaurantOwner\RestaurantOwnerController@index')->name('restaurantownerdashboard');

<<<<<<< HEAD
Route::get('/quiz', 'QuizController@index')->name('quizdashboard');

=======
>>>>>>> development
Route::get('/customer', 'Customer\CustomerController@index')->name('dashboard');

Route::resource('/restaurants', 'RestaurantOwner\RestaurantsController');
Route::get('/restaurants/{restaurant_id}/viewtags', 'Admin\TagsController@restaurantTagIndex')->name('tags.restaurantTagIndex');
Route::get('/restaurants/{restaurant_id}/addtag/{tag_id}', 'Admin\TagsController@addTagRestaurant')->name('tags.addTagRestaurant');
Route::get('/restaurants/{restaurant_id}/removetag/{tag_id}', 'Admin\TagsController@removeTagRestaurant')->name('answers.removeTagRestaurant');

Route::resource('/preferences', 'Customer\CustomerPreferencesController')->only([
    'index', 'update'
])->middleware('verified');

Route::resource('/questions', 'Admin\QuestionsController')->only(['index', 'create', 'store', 'destroy']);

 // routes for AnswersController (modified resource controller)
Route::get('/questions/{question_id}', 'Admin\AnswersController@index')->name('answers.index'); // overrides  questions resource
Route::get('/questions/{question_id}/create', 'Admin\AnswersController@create')->name('answers.create');
Route::post('/questions/{question_id}', 'Admin\AnswersController@store')->name('answers.store');

Route::get('/questions/{question_id}/{answer_id}', 'Admin\TagsController@answerTagIndex')->name('tags.answerTagIndex');
Route::get('/questions/{question_id}/{answer_id}/edit', 'Admin\AnswersController@edit')->name('answers.edit');
Route::put('/questions/{question_id}/{answer_id}/update', 'Admin\AnswersController@update')->name('answers.update');
Route::get('/questions/{question_id}/{answer_id}/addtag/{tag_id}', 'Admin\TagsController@addTagAnswer')->name('tags.addTagAnswer');
Route::get('/questions/{question_id}/{answer_id}/removetag/{tag_id}', 'Admin\TagsController@removeTagAnswer')->name('answers.removeTagAnswer');
Route::delete('/questions/{question_id}/{answer_id}/destroy', 'Admin\AnswersController@destroy')->name('answers.destroy');


Route::get('/tags', 'Admin\TagsController@index')->name('tags.index');
Route::get('/tags/create', 'Admin\TagsController@create')->name('tags.create');
Route::post('/tags', 'Admin\AnswersController@store')->name('tags.store');
Route::delete('/tags/destroy/{id}', 'Admin\TagsController@destroy')->name('tags.destroy');

Route::resource('/users', 'Admin\UsersController');

Route::get('/quiz', 'Customer\QuizController@index')->name('quiz.startPage');
Route::post('/quiz', 'Customer\QuizController@answerQuestion')->name('quiz.answerquestion');
Route::get('/quiz/start', 'Customer\QuizController@startQuiz')->name('quiz.startQuiz');
Route::delete('/quiz', 'Customer\QuizController@destroy')->name('quiz.destroy');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/usershistory', function () {
    return view('usershistory');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
