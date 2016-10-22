<?php

use Illuminate\Database\Seeder;

class EntrustRolesSeed extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('roles')->insert([
					 'name' => 'operator',
					 'display_name' => 'Lab Operator',
					 'description' => 'The lab operator'
					 ]);

		DB::table('roles')->insert([
					 'name' => 'patient',
					 'display_name' => 'Patient',
					 'description' => 'Patient'
					 ]);
	}
}
