<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDtUsersResourcesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dt_users_resources_connections', function(Blueprint $table)
		{
			$table->foreign('resources_id', 'fk_dt_users_resources_connection_dt_resources1')->references('id')->on('dt_resources')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('users_id', 'fk_dt_users_resources_connection_dt_users1')->references('id')->on('dt_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dt_users_resources_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_dt_users_resources_connection_dt_resources1');
			$table->dropForeign('fk_dt_users_resources_connection_dt_users1');
		});
	}

}
