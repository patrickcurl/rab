<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Books', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('author')->nullable();
			$table->string('publisher')->nullable();
			$table->string('image_url')->nullable();
			$table->string('isbn10')->unique();
			$table->string('isbn13')->unique();
			$table->string('amazon_url')->nullable();
			$table->string('edition')->nullable();
			$table->integer('num_of_pages')->nullable();
			$table->float('list_price')->nullable();
			$table->float('weight')->nullable();
			$table->text('editorial_review')->nullable();
			$table->string('customer_reviews')->text();
			$table->string('slug')->unique();
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
		Schema::drop('Books');
	}

}
