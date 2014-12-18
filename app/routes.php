<?php

/**
 * Home page
 */

Route::get('/', 'HomeController@getHomePage');

/**
 * Category, Item and Checkout Routes (RESTful)
 *
 */

Route::resource('category','CategoryController');

Route::resource('item','ItemController');

Route::resource('checkout','CheckoutController');

//Non-RESTful user routes

Route::get('/login', 'UserController@getLogin' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );
Route::get('/signup', 'UserController@getSignup' );
Route::post('/signup', 'UserController@postSignup' );

/**
 * RESTful User routes
 */

Route::resource('user', 'UserController');

/**
 * Admin filter - redirects to home page if user is not an admin
 */

Route::filter('admin', function()
{
    if ( ! Auth::user()->is_admin )
        return Redirect::to('/')
            ->with('flash_message','Sorry, you must be an admin to access that page.');
});

