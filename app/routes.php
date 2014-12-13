<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('homepage');
});

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

Route::get('/trigger-error',function() {

    # Class Foobar should not exist, so this should create an error
    $foo = new Foobar;

});

Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo print_r($results);

});

Route::resource('category','CategoryController');

Route::resource('item','ItemController');

Route::resource('checkout','CheckoutController');

//Non-RESTful user routes:

Route::get('/login', 'UserController@getLogin' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );
Route::get('/signup', 'UserController@create' );
Route::post('/signup', 'UserController@store' );

Route::resource('user', 'UserController');


Route::get('/settestuser', function(){

    $pw = Hash::make('foobar');
    DB::update('update users set password = ? where email = ?', array( $pw, 'rhymes.with.camera@gmail.com'));

});

Route::get('/test-conflict', function(){

    Checkout::conflict('2014-12-13 21:43:24','2014-12-20 18:01:00',1);

});