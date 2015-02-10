<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issue_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('issue_id')->unsigned()->index();
			$table->foreign('issue_id')->references('id')->on('issues');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('type', 255);
			$table->longText('content');
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
		Schema::drop('issue_history');
	}

}
