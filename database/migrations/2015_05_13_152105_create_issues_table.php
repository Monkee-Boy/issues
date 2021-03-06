<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issues', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->longText('content');
			$table->string('link', 255)->nullable();
			$table->integer('assignedto_id')->unsigned()->index();
			$table->string('assignedto_type', 255);
			$table->integer('status_id')->unsigned()->index();
			$table->foreign('status_id')->references('id')->on('statuses');
			$table->integer('priority_id')->unsigned()->index();
			$table->foreign('priority_id')->references('id')->on('priorities');
			$table->integer('parentid')->nullable()->unsigned()->index();
			$table->integer('project_id')->unsigned()->index();
			$table->foreign('project_id')->references('id')->on('projects');
			$table->integer('createdby_id')->unsigned()->index();
			$table->foreign('createdby_id')->references('id')->on('users');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('issues');
	}

}
