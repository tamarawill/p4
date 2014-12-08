<?php

class Checkout extends Eloquent {

    public function users(){

        return $this->belongsTo('User');
    }

    public function items(){

        return $this->belongsTo('Item');
    }

    public function getItemName() {
        try {
            $item = Item::findOrFail($this->item_id);
            $itemname = $item->description;
        }
        catch (Exception $e) {
            return "None";
        }
        return $itemname;
    }


    public function getUserName() {
        try {
            $user = User::findOrFail($this->user_id);
            $username = $user->first_name . " " . $user->last_name;
        }
        catch (Exception $e) {
            return "None";
        }
        return $username;
    }



}