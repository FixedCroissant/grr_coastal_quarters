<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestReservationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('coastal_quarters_guest_reservations',function ($table)
        {
         //Create incrementing id
         $table->increments('id');
         //Create timestamps
        $table->timestamps();
        //Status
        $table->string('status',255);
        //First Name
        $table->string('f_name',255);
        //Last Name
        $table->string('l_name',255);
        //EMail Address (guest)
        $table->string('guest_email_address',150);



        //Billing Names
        //Billing First Name
        $table->string('billing_first_name',255);
        //Billing Last Name
        $table->string('billing_last_name',255);
        //Billing Address Line 1
        $table->string('billing_line_address_001',255);
        //Billing Address Line 2
        $table->string('billing_line_address_002',255);
        //Billing City
        $table->string('billing_city',255);
        //Billing State
        $table->string('billing_state',255);
        //Billing Zip Code
        $table->string('billing_zip_code',100);
        //Billing Country
        $table->string('billing_country',255);
        //Billing E-Mail Address
        $table->string('billing_email_address',150);
        //Out of Country Indicator
        $table->string('out_of_country_indicator',10);
        //Phone Number
        $table->string('phone_number',25);
        //Arrival Date
        $table->date('arrival_date');
        //Departure Date
        $table->date('departure_date');
        //Guests
        $table->integer('number_of_guests');
        //HostFirst Name
        $table->string('host_first_name',250);
        //Host Lane Name
        $table->string('host_last_name',250);
        //Host Title
        $table->string('host_title',100);
        //Host Department or Organization
        $table->string('host_department_org',150);
        //Host Address 001
        $table->string('host_address_001',200);
        //Host Address 002
        $table->string('host_address_002',200);
        //Host City Name
        $table->string('host_city',250);
        //Host State Name
        $table->string('host_state',200);
        //Host Zip Code
        $table->string('host_zip_code',100);
        //Host Phone Number
        $table->string('host_phone_number',25);
        //Host E-Mail Address
        $table->string('host_email_address',100);
        //Additional Text about Host
        $table->text('additional_information_about_reservation');
        //Who Pays?
        $table->string('who_pays',25);
        //OUC
        $table->string('ouc',25);
        //Program or Grant Number
        $table->string('projgrant',25);
        //Bookkeeper
        $table->string('bookkeeper',100);
        //Agree to the Terms
        $table->string('terms',25);
        //Room Days
        $table->integer('room_days');
        //Room Charge
        $table->string('roomcharge',10);
        //Add Guest Days
        $table->integer('addguestdays');
        //Add Guest Charge
        $table->string('add_guest_charge',10);
        //Total Charge
        $table->string('total_charge',10);
       //Pay Status
        $table->string('paystatus',50);


        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop table
        Schema::drop('coastal_quarters_guest_reservations');
	}

}
