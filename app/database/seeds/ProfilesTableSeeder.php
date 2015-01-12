<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProfilesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Profile::create([
				'user_id'		=> rand(1,10),
				'title'			=> 'Creator',
				'summary'		=> $faker->paragraph($nbSentences = 3),
				'profile_img'	=> $faker->imageUrl($width = 640, $height = 480),
				'website_url'	=> $faker->url
			]);
		}
	}
}