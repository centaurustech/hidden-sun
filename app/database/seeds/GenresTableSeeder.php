<?php


class GenresTableSeeder extends Seeder {

	public function run()
	{
		DB::table('genres')->delete();

		$genre = new Genre();
        $genre->genre = "Action & Adventure";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Animation";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Biopics";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Children/Family";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Comedy";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Crime";
        $genre->parent_genre = "0";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Documentary";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Drama";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Horror";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Latino";
        $genre->parent_genre = "0";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Music Documentary";
        $genre->parent_genre = "0";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Musical";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Period/Historical";
        $genre->parent_genre = "0";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Romance";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Science Fiction & Fantasy";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Spanish Language";
        $genre->parent_genre = "0";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Short Films";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Sports";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Thriller";
        $genre->parent_genre = "1";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "War Films";
        $genre->parent_genre = "0";
        $genre->save();

        $genre = new Genre();
        $genre->genre = "Westerns";
        $genre->parent_genre = "1";
        $genre->save();

     }

}
        
