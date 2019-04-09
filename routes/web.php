<?php



 Route::get('/', function () {return view('welcome');
 });

//  Auth::routes();

Route::get('/blogs','BlogController@home');
Route::get('/blogs/create','BlogController@addBlog');
Route::post('/blogs','BlogController@store');
Route::get('blogs/{blog}','BlogController@details');
Route::post('/blogs/{blog}/show','CommentsController@store');