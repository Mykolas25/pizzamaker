<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDtIngredientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dt_ingredients', function(Blueprint $table)
		{
            $table->foreign('resources_id', 'fk_dt_resources_dt_ingredients1')->references('id')->on('dt_resources')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dt_ingredients', function(Blueprint $table)
		{
			$table->dropForeign('fk_dt_resources_dt_ingredients1');
		});
	}

}
