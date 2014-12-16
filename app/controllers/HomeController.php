<?php

class HomeController extends BaseController {


	public function getHomePage()
	{
        $mycheckouts = array();

        if (Auth::check()) {
            $mycheckouts = Checkout::where('user_id', '=', Auth::user()->id)->get();
        }
		return View::make('homepage')
            ->with('mycheckouts', $mycheckouts);
	}

}
