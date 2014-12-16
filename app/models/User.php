<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


    public function checkouts () {
        return $this->hasMany('Checkout');
    }

    /**
     * Returns true if any items are associated with the category.
     */

    public function hasCheckouts(){

        $checkouts = Checkout::where('user_id', '=', $this->id)->count();

        if ($checkouts == 0){
            return false;
        }

        return true;
    }

}
