<?php

class ItemController extends \BaseController {


    public function __construct() {
        parent::__construct();

        $this->beforeFilter('auth');

        $this->beforeFilter('admin', array('except' => array('index','show')));

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = Item::all()->sortBy('description');

        return View::make('item_index')->with('items',$items);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::getIdNamePair();

        return View::make('item_create')
            ->with('categories',$categories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $rules = array(
            'description' => 'required|unique:items,description',
            'category_id' => 'required|integer|min:1',
            'make' => 'required',
            'model' => 'required',
            'serial' => 'required|unique:items,serial',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/item/create')
                ->withInput()
                ->with('flash_message', 'Please fix errors and try again.')
                ->withErrors($validator);
        }

        $item = new Item();
        $item->description = Input::get('description');
        $item->category_id = Input::get('category_id');
        $item->make = Input::get('make');
        $item->model = Input::get('model');
        $item->serial = Input::get('serial');
        $item->notes = Input::get('notes');
        $item->save();
        return Redirect::action('ItemController@index')
            ->with('flash_message','Item ' . $item->description .' has been added.');
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
            $item = Item::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/item')
                ->with('flash_message', 'Item with id ' . $id . ' not found.');
        }

        return View::make('item_show')
            ->with('item', $item);
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
            $item = Item::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/item')
                ->with('flash_message', 'Item with id ' . $id . ' not found.');
        }

        $categories = Category::getIdNamePair();

        return View::make('item_edit')
            ->with('item', $item)
            ->with('categories',$categories);

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
            $item = Item::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/item')
                ->with('flash_message', 'Item with id ' . $id . ' not found.');
        }

        $rules = array(
            'description' => 'required|unique:items,description,'.$id,
            'category_id' => 'required|integer|min:1',
            'make' => 'required',
            'model' => 'required',
            'serial' => 'required|unique:items,serial,'.$id,
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/item/'.$id.'/edit/')
                ->withInput()
                ->with('flash_message', 'Please fix errors and try again.')
                ->withErrors($validator);
        }


        $item->description = Input::get('description');
        $item->category_id = Input::get('category_id');
        $item->make = Input::get('make');
        $item->model = Input::get('model');
        $item->serial = Input::get('serial');
        $item->notes = Input::get('notes');
        $item->save();

        return Redirect::action('ItemController@index')
            ->with('flash_message','Item ' . $item->description .' has been updated.');
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
            $item = Item::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/item')
                ->with('flash_message', 'Item with id ' . $id . ' not found.');
        }

        if($item->hasCheckouts()){
            return Redirect::to('/item/'.$id.'/edit')
                ->with('flash_message', 'Item is currently checked out and cannot be deleted.');
        }

        $desc = $item->description;
        Item::destroy($id);

        return Redirect::action('ItemController@index')
            ->with('flash_message','Item ' . $desc .' has been deleted.');

    }


}
