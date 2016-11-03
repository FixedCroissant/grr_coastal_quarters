<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPurposeOfVisitFieldToReservation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Add the field purpose of visit to capture exactly why people are staying.
        Schema::table('coastal_quarters_guest_reservations', function($table)
        {
            //Check for the table.
            if(Schema::hasTable('coastal_quarters_guest_reservations')){

                //Create a text field to handle the reason why they want to stay.
                $table->text('reason_for_staying')->nullable()->after('additional_information_about_reservation');
            }

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        //Drop the prior column.

        Schema::table('coastal_quarters_guest_reservations', function($table)
        {
            $table->dropColumn('reason_for_staying');
        });
	}

}
