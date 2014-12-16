<?php

class CategoryController extends \BaseController {


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
		$categories = Category::all()->sortBy('name');

        return View::make('category_index')->with('categories',$categories);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('category_create');
    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $rules = array(
            'name' => 'required|unique:categories,name',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/category/create')
                ->withInput()
                ->with('flash_message', 'Please fix errors and try again.')
                ->withErrors($validator);
        }

        $category = new Category();
        $category->name = Input::get('name');
        $category->save();
        return Redirect::action('CategoryController@index')
            ->with('flash_message','Category ' . $category->name .' has been added.');
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
            $category = Category::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/category')
                ->with('flash_message', 'Category with id ' . $id . ' not found.');
        }
        return View::make('category_show')->with('category', $category);
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
            $category = Category::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/category')
                ->with('flash_message', 'Category with id ' . $id . ' not found.');
        }
        return View::make('category_edit')->with('category', $category);

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
        $category = Category::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/category')
                ->with('flash_message', 'Category with id ' . $id . ' not found.');
        }

        $rules = array(
            'name' => 'required|unique:categories,name,'.$id,
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/category/'.$id.'/edit/')
                ->withInput()
                ->with('flash_message', 'Please fix errors and try again.')
                ->withErrors($validator);
        }

        $oldname = $category->name;
        $category->name = Input::get('name');
        $category->save();

        return Redirect::action('CategoryController@index')
            ->with('flash_message','Category ' . $oldname .' has been renamed to ' . $category->name . '.');
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
            $category = Category::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/category')
                ->with('flash_message', 'Category with id ' . $id . ' not found.');
        }

        if($category->hasItems()){
            return Redirect::to('/category/'.$id.'/edit')
                ->with('flash_message', 'The category ' . $category->name
                    . ' is assigned to at least one item and cannot be deleted.');
        }

        $catname = $category->name;
        Category::destroy($id);

        return Redirect::action('CategoryController@index')
            ->with('flash_message','Category ' . $catname .' has been deleted.');


    }


}
