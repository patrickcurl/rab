<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $t)
		{
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('user')->unsigned();
			$t->string('tracking_number')->nullable();
			$t->text('ups_label')->nullable();
			$t->float('total_amount');
			$t->date('received_date')->nullable();
			$t->date('paid_date')->nullable();
			$t->text('comments')->nullable();
			$t->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
