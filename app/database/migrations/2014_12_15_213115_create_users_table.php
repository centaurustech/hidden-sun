<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 100);
			$table->string('password', 100);
			$table->string('password_temp', 100)->nullable();
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('phone_number', 25)->nullable();
			$table->string('city', 50);
			$table->string('state', 25);
			$table->string('activation_code', 60);
			$table->integer('active', 1);
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
		Schema::drop('users');
	}

}
