

<?php
use Illuminate\Http\Request;
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

// Route::post('logout', 'API\UserController@logout');

Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
Route::get('/blogs/{blog}','API\UserController@detail');
Route::post('/blogs','API\UserController@store');
Route::post('/blog','API\UserController@stores');
Route::get('/blogs/{blog}/edit', 'API\UserController@edit');
Route::post('/blogs/{blog}', 'API\UserController@update');
Route::delete('/blogs/{blog}', 'API\UserController@destroy');
 Route::get('logout', 'API\UserController@logout');
 Route::get('blogs','API\UserController@home'); 

});

