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

        print_r('Checkout start date to test: ' . $start);
        print_r('Checkout end date to test: ' . $end);
        print_r('Checkout item id to test: ' . $itemid);



        //get array of checkouts matching $itemid
        $checkouts = Checkout::where('item_id' == $itemid);

        //loop through array and determine if conflict
        //if there is a conflict, return true
        foreach ($checkouts as $checkout) {
            print_r('Testing a checkout on item ' . $checkout->item_id
                . 'with start date ' . $checkout->start_date
                . 'and end date' . $checkout->end_date);

            if( $checkout->start_date < $start
                && $checkout->end_date > $start ) {
                //return true;
                print_r('Conflict on first if');
            }
            if ($checkout->start_date > $start
                && $checkout->start_date < $end ) {
                //return true;
                print_r('Conflict on second if');

            }

            //return false;
            print_r('No conflict.');
        }



        //at end of loop, if no conflict found, return false
    }

}