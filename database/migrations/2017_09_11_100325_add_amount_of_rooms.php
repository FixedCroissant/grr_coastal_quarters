<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAmountOfRooms extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('coastal_quarters_guest_reservations', function(Blueprint $table)
		{
			//Add a new field to track the amount of rooms indicated by the individual.
            $table->tinyInteger('number_of_rooms');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('coastal_quarters_guest_reservations', function(Blueprint $table)
		{
			//drop new field
            $table->dropColumn('number_of_rooms');
		});
	}

}
