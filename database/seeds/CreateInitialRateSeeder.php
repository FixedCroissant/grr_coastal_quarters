<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CreateInitialRateSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		//Create 1 initial rate in the system.
        DB::table('custom_rates')->insert(['created_at'=>\Carbon\Carbon::now()->format('Y-m-d h:i:s'),'updated_at'=>\Carbon\Carbon::now()->format('Y-m-d h:i:s'),'rate_active'=>'Y','rate_name'=>'Fake Test Rate','rate_amount'=>'1.00']);


        Model::reguard();
	}

}
