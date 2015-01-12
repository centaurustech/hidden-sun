<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('title');
			$table->longText('summary');
			$table->string('profile_img');
			$table->string('website_url');
			$table->string('facebook_url')->default('http://www.facebook.com/');
			$table->string('twitter_url')->default('http://www.twitter.com/');
			$table->string('linkedin_url')->default('http://www.linkedin.com/');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
