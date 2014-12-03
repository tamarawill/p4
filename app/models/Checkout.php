<?php

class Checkout extends Eloquent {

    public function users(){

        return $this->belongsTo('User');
    }

    public function items(){

        return $this->belongsTo('Item');
    }

}