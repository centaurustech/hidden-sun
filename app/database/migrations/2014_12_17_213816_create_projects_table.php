<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('project_title')->default('Untitled Project');
			$table->longText('synopsis');
			$table->date('start_date')->default('9999-01-01');
			$table->date('complete_date')->default('9999-01-01');
			$table->string('funds_end_date');
			$table->decimal('funds_current', 11, 2);
			$table->decimal('funds_goal', 11, 2);
			$table->integer('genre_id')->unsigned();
			$table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
			$table->integer('owner_id')->unsigned();
			$table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
			$table->enum('stage', array('pre-production', 'in-production', 'post-production'));
			$table->string('video_url');
			$table->integer('content_id')->unsigned();
			$table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade')->nullable();
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
		Schema::drop('projects');
	}

}
