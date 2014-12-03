<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixFks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('checkouts', function($table)
        {
            $table->dropForeign('checkouts_category_id_foreign');
            $table->dropColumn('category_id'); #FK
        });

        Schema::table('items', function($table)
        {
            $table->integer('category_id')->unsigned(); #FK
            $table->foreign('category_id')->references('id')->on('categories');
        });

    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('checkouts', function($table)
        {
            $table->integer('category_id')->unsigned(); #FK
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('items', function($table)
        {
            $table->dropForeign('items_category_id_foreign');
            $table->dropColumn('category_id'); #FK
        });

    }

}
