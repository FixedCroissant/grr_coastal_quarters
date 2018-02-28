<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitOrPersonField extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('custom_rates', function(Blueprint $table)
		{
			//Add new field
            $table->string('rate_is_unit_or_person',10);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('custom_rates', function(Blueprint $table)
		{
			//drop new field
            $table->dropColumn('rate_is_unit_or_person');
		});
	}

}
