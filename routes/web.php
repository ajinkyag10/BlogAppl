<?php



 Route::get('/', function () {return view('welcome');
 });

 Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blogs','BlogController@home');
Route::get('/blogs/create','BlogController@addBlog')->middleware('auth');
Route::post('/blogs','BlogController@store');
Route::get('/blogs/{blog}','BlogController@details');
Route::post('/blogs/{blog}','CommentsController@store');
Route::get('/blogs/{blog}/edit', 'BlogController@edit');
Route::patch('/blogs/{blog}', 'BlogController@update');
Route::delete('/blogs/{blog}', 'BlogController@destroy')->middleware('auth');


