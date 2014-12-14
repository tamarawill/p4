<?php

class Category extends Eloquent {

    public function items() {

        return $this->hasMany('Item');

    }

    public static function getIdNamePair() {
        $categories = Array();
        $collection = Category::all();
        foreach($collection as $category) {
            $categories[$category->id] = $category->name;
        }
        return $categories;
    }

    /**
     * Returns true if any items are associated with the category.
     */

    public function hasItems(){

        $items = Item::where('category_id', '=', $this->id)->count();

        if ($items == 0){
            return false;
        }

        return true;
    }

}

