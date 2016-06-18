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

  $request = Request::all();

  $new_book = App\Book::create($request);

  return $new_book;
});

//Read List
Route::get('/books', function(){
  return App\Book::all();
});

//Read Detail
Route::get('/books/{id}', function($id){
  return App\Book::find($id);
});

//Update
Route::put('/books/{id}', function($id){
  $request = Request::all();
  App\Book::where('id', $id)
          ->update($request);
  return App\Book::find($id);
});

//Delete
Route::delete('/books/{id}', function($id){
  $book = App\Book::find($id);
  $book->delete();
  return $book;
});


//Checkout
Route::post('/checkout', function(){

  $request = Request::all();

  $checkout = App\Checkout::Create($request);

  return $checkout;
});

//Return
Route::post('/return/{book_id}', function($book_id){

  $checkout = App\Checkout::where('book_id',$book_id)->first();

  $checkout->returned = true;

  $checkout->save();

  return $checkout;
});
