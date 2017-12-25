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
*/

// use App\Task;

// Route::get('/tasks', 'TasksController@index');

// Route::get('/tasks', function () {
//     // $tasks = DB::table('tasks')->latest()->get();
//     $tasks = Task::all();
//     return view('tasks.index', compact('tasks'));
// });


// Route::get('/tasks/{task}', 'TasksController@show');

// Route::get('/tasks/{task}', function ($id) {
//     // dd($id);
//     // $task = DB::table('tasks')->find($id);
//     $task = Task::find($id);
//     return view('tasks.show', compact('task'));
// });




// $stripe = App::make('App\Billing\Stripe');
//app or resolve also applicable
// dd($stripe);
Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
