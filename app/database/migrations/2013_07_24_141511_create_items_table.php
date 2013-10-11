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
		Schema::create('items', function(Blueprint $t)
		{
			// We'll need to ensure that MySQL uses the InnoDB engine to
      // support the indexes, other engines aren't affected.
     		$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('book_id')->unsigned()->index();
			$t->integer('order_id')->unsigned()->index();
			$t->integer('qty');
			$t->float('price');
			$t->timestamps();

			// $t->foreign('book_id')->references('id')->on('books');
			// $t->foreign('order_id')->references('id')->on('orders');

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
