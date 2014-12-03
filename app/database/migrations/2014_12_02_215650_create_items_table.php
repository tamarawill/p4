<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function($table){

            $table->increments('id');

            $table->string('description');
            $table->string('make');
            $table->string('model');
            $table->string('serial')->unique();
            $table->text('notes');

            $table->timestamps();

        });


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('items');
    }

}
