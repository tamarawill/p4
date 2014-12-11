<?php


class UserController extends BaseController {

    public function __construct() {

        parent::__construct();
    }

    public function getLogin() {

        return View::make('login_form');
    }

    public function postLogin() {
        $credentials = Input::only('email', 'password');

        if (Auth::attempt($credentials, $remember = false)) {
            return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
        }
        else {
            return Redirect::to('/login')
                ->with('flash_message', 'Log in failed; please try again.')
                ->withInput();
        }
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to('/login');
    }
















} // End class UserController