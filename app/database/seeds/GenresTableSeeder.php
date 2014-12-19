<?php


class GenresTableSeeder extends Seeder {

	public function run()
	{
		DB::table('genres')->delete();

		$genre = new Genre();
        $genre->genre = "action_adventure";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "animation";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "biopics";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "bollywood";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "comedy";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "crime";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "documentary";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "drama";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "family"; 
        $genre->save();

        $genre = new Genre();
        $genre->genre = "horror";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "music_documentary";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "musicals";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "period_and_historical";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "romance";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "science_fiction";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "fantasy";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "short_films";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "sport";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "thriller";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "war_films";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "westerns";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "world_cinema";
        $genre->save();

     }

}
        
