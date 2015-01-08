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
			$table->integer('issueid')->unsigned()->index();
			$table->integer('userid')->unsigned()->index();
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
