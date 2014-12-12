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

    public static function conflict($start, $end, $itemid){
        //returns conflicting Checkout
        //or returns 0 or null if none

        //get array of checkouts matching $itemid
        $checkouts = Checkout::where('item_id' == $itemid);

        //loop through array and determine if conflict
        //if there is a conflict, return true
        foreach ($checkouts as $checkout) {
            if( $checkout->start_date < $start
                && $checkout->end_date > $start ) {
                return true;
            }
            if ($checkout->start_date > $start
                && $checkout->start_date < $end ) {
                return true;
            }

            return false;
        }



        //at end of loop, if no conflict found, return false
    }

}