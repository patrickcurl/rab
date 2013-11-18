<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotDocUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doc_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('doc_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('doc_id')->references('id')->on('docs')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('doc_user');
	}

}
