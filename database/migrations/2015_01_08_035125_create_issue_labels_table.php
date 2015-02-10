<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueLabelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issue_label', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('issue_id')->unsigned()->index();
			$table->foreign('issue_id')->references('id')->on('issues');
			$table->integer('label_id')->unsigned()->index();
			$table->foreign('label_id')->references('id')->on('labels');
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
		Schema::drop('issue_labels');
	}

}
