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
			$table->integer('assigned_to')->unsigned()->index();
			$table->tinyInteger('assigned_type')->unsigned()->index();
			$table->integer('statusid')->unsigned()->index();
			$table->integer('priorityid')->unsigned()->index();
			$table->integer('parentid')->nullable()->unsigned()->index();
			$table->integer('created_by')->unsigned()->index();
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
