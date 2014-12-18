<?php

class Item extends Eloquent {

    public function checkouts() {

        return $this->hasMany('Checkout');
    }

    public function categories() {

        return $this->belongsTo('Category');
    }

    /**
     * Returns the name of the category.
     *
     * @return string
     */

    public function getCategoryName() {
        try {
            $category = Category::findOrFail($this->category_id);
            $categoryname = $category->name;
        }
        catch (Exception $e) {
            return "None";
        }
        return $categoryname;

    }

    /**
     * Based on a function in "Foobooks 2014" by Susan Buck
     * (an example project for CSCI E-15 at Harvard Extension School,
     * Fall 2014)
     * https://github.com/susanBuck/foobooks/blob/master/app/models/Tag.php
     *
     * @return array
     */

    public static function getIdNamePair() {
        $items = Array();
        $collection = Item::all();
        foreach($collection as $item) {
            $items[$item->id] = $item->description;
        }
        return $items;
    }


    /**
     * Returns true if any items are associated with the category.
     *
     * @return bool
     */

    public function hasCheckouts(){

        $checkouts = Checkout::where('item_id', '=', $this->id)->count();

        if ($checkouts == 0){
            return false;
        }

        return true;
    }


}