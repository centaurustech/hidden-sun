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
			$table->string('funds_start_date');
			$table->string('funds_end_date');
			$table->decimal('funds_goal', 11, 2);
			$table->enum('stage', array('pre-production', 'in-production', 'post-production'));
			$table->string('video_url');
			$table->string('thumbnail_url');
			$table->enum('status', array('active', 'inactive', 'pending activation', 'flagged', 'ended'))->default('pending activation');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
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
