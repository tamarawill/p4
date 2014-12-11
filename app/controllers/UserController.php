<?php


class UserController extends BaseController {

    public function __construct() {

        parent::__construct();

    }

    public function getLogin() {

        return View::make('user_loginform');
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
        return Redirect::to('/');
    }

    public function getSignup() {
        return View::make('user_signupform');
    }

    public function postSignup() {

        $rules = array(
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password2' => 'required|same:password',
            'first_name' => 'required',
            'last_name' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/signup')
                ->withInput()
                ->with('flash_message', 'Please fix errors and try again.')
                ->withErrors($validator);
        }

        $user = new User();
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->save();
        Auth::login($user);
        return Redirect::to('/')
            ->with('flash_message','Welcome ' . $user->first_name . '!');
    }



} // End class UserController