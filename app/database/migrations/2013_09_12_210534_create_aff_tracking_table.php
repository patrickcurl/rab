<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAffTrackingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aff_tracking', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->index()->nullable();
			$table->string('ip_address')->nullable();
			$table->string('ref_url')->nullable();
			$table->string('campaign_id')->nullable();
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
		Schema::drop('aff_tracking');
	}

}
