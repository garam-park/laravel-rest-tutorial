<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//Create
Route::post('/books', function(){
  return 'create book';
});

//Read List
Route::get('/books', function(){
  return 'read list of book';
});

//Read Detail
Route::get('/books/{id}', function($id){
  return 'read book '.$id;
});

//Update
Route::put('/books/{id}', function($id){
  return 'update book '.$id;
});

//Delete
Route::delete('/books/{id}', function($id){
  return 'delete book '.$id;
});
