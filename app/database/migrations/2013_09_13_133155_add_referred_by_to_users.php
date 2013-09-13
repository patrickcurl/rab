<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddReferredByToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->unsignedInteger('referred_by')->index()->nullable();
			$table->float('commission_level')->default('0.06');
			$table->float('price_level')->nullable();
			$table->string('primary_website')->nullable();
			$table->string('username')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropColumn('referred_by');
			$table->dropColumn('commission_level');
			$table->dropColumn('price_level');
			$table->dropColumn('primary_website');
			$table->dropColumn('username');
		});
	}

}
