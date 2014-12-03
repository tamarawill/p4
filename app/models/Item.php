<?php

class Item extends Eloquent {

    public function checkouts() {

        return $this->hasMany('Checkout');
    }

    public function categories() {

        return $this->belongsTo('Category');
    }

}