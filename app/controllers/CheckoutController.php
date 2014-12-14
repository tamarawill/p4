<?php

class CheckoutController extends \BaseController {

    public function __construct() {
        parent::__construct();

        $this->beforeFilter('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $checkouts = Checkout::all()->sortBy('end_time');

        return View::make('checkout_index')->with('checkouts',$checkouts);

    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $items = Item::getIdNamePair();

        return View::make('checkout_create')
            ->with('items',$items)
            ->with('userid', Auth::id() ); //replace with actual value when auth implemented

    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $starttime = date('Y-m-d H:i:s');

        $rules = array(
            'end_time' => 'required|date|after:'.$starttime,
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/checkout/create')
                ->withInput()
                ->with('flash_message', 'Please fix errors and try again.')
                ->withErrors($validator);
        }

        if (Checkout::conflict($starttime, Input::get('end_time'), Input::get('item_id')))
            return Redirect::to('/checkout/create')
                ->withInput()
                ->with('flash_message', 'There is a conflicting checkout for this item.');


        $checkout = new Checkout();
        $checkout->item_id = Input::get('item_id');
        $checkout->user_id = Input::get('userid');
        $checkout->start_time = $starttime;
        $checkout->end_time = Input::get('end_time');
        $checkout->save();
        return Redirect::action('CheckoutController@index')
            ->with('flash_message','You have checked out ' . $checkout->getItemName() . '.');
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
            $checkout = Checkout::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/checkout')
                ->with('flash_message', 'Checkout with id ' . $id . ' not found.');
        }

        return View::make('checkout_show')
            ->with('checkout', $checkout);
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
            $checkout = Checkout::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/checkout')
                ->with('flash_message', 'Checkout with id ' . $id . ' not found.');
        }

        $items = Item::getIdNamePair();

        return View::make('checkout_edit')
            ->with('checkout', $checkout)
            ->with('items', $items);

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
            $checkout = Checkout::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/checkout')
                ->with('flash_message', 'Checkout with id ' . $id . ' not found.');
        }

        $rules = array(
            'end_time' => 'required|date|after:'.$checkout->start_time,
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/checkout/'.$id.'/edit/')
                ->withInput()
                ->with('flash_message', 'Please fix errors and try again.')
                ->withErrors($validator);
        }

        if (Checkout::conflict($checkout->start_time, Input::get('end_time'), Input::get('item_id')))
            return Redirect::to('/checkout/'.$id.'/edit/')
                ->withInput()
                ->with('flash_message', 'There is a conflicting checkout for this item.');

        $checkout->end_time = Input::get('end_time');
        $checkout->save();
        return Redirect::action('CheckoutController@index')
            ->with('flash_message','Checkout end date for ' . $checkout->getItemName()
                . ' changed to ' . $checkout->end_time . '.');


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
            $checkout = Checkout::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/checkout')
                ->with('flash_message', 'Checkout with id ' . $id . ' not found.');
        }

        $itemname = $checkout->getItemName();
        Checkout::destroy($id);

        return Redirect::action('CheckoutController@index')
            ->with('flash_message', $checkout->getItemName() . ' has been checked in.');
    }


}
