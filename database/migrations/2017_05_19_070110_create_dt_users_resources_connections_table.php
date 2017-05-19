<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDtUsersResourcesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dt_users_resources_connections', function(Blueprint $table)
		{
			$table->integer('count')->primary();
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->string('users_id', 36)->index('fk_dt_users_resources_connection_dt_users1_idx');
			$table->string('resources_id', 36)->index('fk_dt_users_resources_connection_dt_resources1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dt_users_resources_connections');
	}

}
