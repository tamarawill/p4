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

}