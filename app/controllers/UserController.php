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

    public function store() {

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
        $user->is_admin = 0;
        $user->save();
        if (Auth::check()) {
            return Redirect::action('UserController@index')
                ->with('flash_message','User ' . $user->first_name . ' ' . $user->last_name . ' has been added.');
        } else {
            Auth::login($user);
            return Redirect::to('/')
                ->with('flash_message', 'Welcome ' . $user->first_name . '!');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all()->sortBy('last_name');

        return View::make('user_index')->with('users',$users);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('user_signupform');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/user')
                ->with('flash_message', 'User with id ' . $id . ' not found.');
        }
        return View::make('user_show')->with('user', $user);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/user')
                ->with('flash_message', 'User with id ' . $id . ' not found.');
        }
        return View::make('user_edit')->with('user', $user);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        try {
            $user = User::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/user')
                ->with('flash_message', 'User with id ' . $id . ' not found.');
        }

        $rules = array(
            'email' => 'required|email|unique:users,email,'.$id,
            'first_name' => 'required',
            'last_name' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/user/'.$id.'/edit/')
                ->withInput()
                ->with('flash_message', 'Please fix errors and try again.')
                ->withErrors($validator);
        }

        $user->email = Input::get('email');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->is_admin = Input::get('is_admin');
        $user->save();

        return Redirect::action('UserController@index')
            ->with('flash_message','User ' . $user->first_name . ' ' . $user->last_name . ' has been edited.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/user')
                ->with('flash_message', 'User with id ' . $id . ' not found.');
        }

        $useremail = $user->email;
        User::destroy($id);

        return Redirect::action('UserController@index')
            ->with('flash_message','User ' . $useremail .' has been deleted.');


    }




} // End class UserController