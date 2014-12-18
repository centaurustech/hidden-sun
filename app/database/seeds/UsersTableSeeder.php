<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([ 

				'email'=>$faker->safeEmail,
				'password'=>$faker->password,
				'first_name'=>$faker->firstName,
				'last_name'=>$faker->lastName,
				'phone_number'=>$faker->phoneNumber,
				'city'=>$faker->city,
				'state'=>$faker->state,
				'activation_code'=> str_random(60)
				


			]);
		}
	}

}