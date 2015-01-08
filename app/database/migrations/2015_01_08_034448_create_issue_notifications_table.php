<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issue_notifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('issueid')->unsigned()->index();
			$table->integer('userid')->unsigned()->index();
			$table->boolean('status');
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
		Schema::drop('issue_notifications');
	}

}
