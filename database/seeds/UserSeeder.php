<?php

use Illuminate\Database\Seeder;
use App\Model\User as User;
use App\Model\Patient as Patient;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$names = [	'Ha Kittrell',
					'Reva Delacerda',
					'Jules Villescas',
					'Jerald Tacy',
					'Kesha Eatmon',
					'Latonia Selig',
					'Bobette Parkins',
					'Glayds Regis',
					'Shantell Cordes',
					'Hope Birkhead',
					'Otto Hannahs',
					'Michaela Castenada',
					'Andree Cloutier',
					'Charisse Sowers',
					'Ray Mikula',
					'Antwan Cureton',
					'Delfina Pullin',
					'Noe Axelson',
					'Al Leishman',
					'Vivian Fults',
					];
		$sex = ['male', 'female'];

	   $pedro = User::create([
					 'name' => 'Pedro',
					 'password' => bcrypt(123456),
					 ]);
	   $pedro->attachRole(1);
	   $alvara = User::create([
					 'name' => 'Alvara',
					 'password' => bcrypt(123456),
					 ]);
	   $alvara->attachRole(2);

	   foreach ($names as $name) {
		$user = User::create([
				 'name' => $name,
				 'password' => bcrypt(rand(10000000,99999999)),
				 ]);
		$role = rand(1,2);
		$user->attachRole($role);
		if($role = 2){
			Patient::create([
				'user_id' => $user->id,
				'sex' => $sex[rand(0,1)],
				'address' => 'road '.$names[rand(0,12)],
				'postcode' => rand(10000000,99999999),
				'phone' => rand(10000000,99999999)
				]);
		}

	}


	}
}
