<?php

class Item extends Eloquent {

    public function checkouts() {

        return $this->hasMany('Checkout');
    }

    public function categories() {

        return $this->belongsTo('Category');
    }

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
     */

    public function hasCheckouts(){

        $checkouts = Checkout::where('item_id', '=', $this->id)->count();

        if ($checkouts == 0){
            return false;
        }

        return true;
    }


}