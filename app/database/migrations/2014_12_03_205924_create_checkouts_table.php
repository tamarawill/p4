<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('checkouts', function($table) {

            $table->increments('id');

            $table->integer('user_id')->unsigned(); #FK
            $table->integer('category_id')->unsigned(); #FK
            $table->integer('item_id')->unsigned(); #FK
            $table->dateTime('start_time');
            $table->dateTime('end_time');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('item_id')->references('id')->on('items');
        });

    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('checkouts');
	}

}
