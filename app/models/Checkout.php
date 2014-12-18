<?php

class Checkout extends Eloquent {

    public function users(){

        return $this->belongsTo('User');
    }

    public function items(){

        return $this->belongsTo('Item');
    }

    /**
     * Returns the description of the item associated with the checkout.
     *
     * @return string
     */

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

    /**
     * Returns the name of the user associated with the checkout.
     *
     * @return string
     */

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

    /**
     * Used to determine if an item can be checked out.
     * Returns true if any current checkout overlaps with a checkout of item $itemid
     * would start at $start and end at $end.
     * Designed to be compatible with
     *
     * @param $start start time of the desired checkout
     * @param $end end time of the desired checkout
     * @param $itemid itemid of the desired checkout
     * @return bool
     */

    public static function conflict($start, $end, $itemid){
        //returns conflicting Checkout
        //or returns 0 or null if none

        //get array of checkouts matching $itemid
        $checkouts = Checkout::where('item_id', '=', $itemid)->get();

        //loop through array and determine if conflict
        //if there is a conflict, return true
        foreach ($checkouts as $checkout) {

            if( $checkout->start_time < $start
                && $checkout->end_time > $start ) {
                return true;
            } else if ($checkout->start_time > $start
                && $checkout->start_time < $end ) {
                return true;
            }
        }

        //at end of loop, if no conflict found, return false
        return false;

    }

    /**
     * Returns a nicely formatted date for display on pages.
     *
     * @param $date_string
     * @return bool|string
     */

    public static function shortDate($date_string) {

        return date_format(DateTime::createFromFormat('Y-m-d H:i:s', $date_string), 'M j g:i a');
    }


}