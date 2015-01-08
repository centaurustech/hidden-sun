<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GenreProjectTableSeeder extends Seeder {

	public function run()
	{
		foreach(range(1, 15) as $index)
		{
            DB::table('genre_project')->insert(array(
            array('genre_id' => rand(1,21), 'project_id' => rand(1,15)),  
        ));
		}
	}

}

