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
}