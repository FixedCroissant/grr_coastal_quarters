<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('custom_rates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            //Add whether it is active or not in system.
            $table->string('rate_active',10);
            //Add Rate Name
            $table->string('rate_name',255);
            //Add Rate Amount -- DOUBLE for .00
            $table->double('rate_amount',5,3);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Drop entire table.
	    Schema::drop('custom_rates');
	}

}
