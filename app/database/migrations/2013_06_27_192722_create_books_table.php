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
		Schema::create('books', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('title');
			$table->string('author')->nullable();
			$table->string('publisher')->nullable();
			$table->string('image_url')->nullable();
			$table->string('isbn10')->unique()->nullable();
			$table->string('isbn13')->unique()->nullable();
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
