<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		/* Drop join tables. */
		DB::table('user_projects')->delete();
		DB::table('user_teams')->delete();

		$this->call('ProjectTableSeeder');
		$this->command->info('Project table seeded!');

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('TeamTableSeeder');
		$this->command->info('Team table seeded!');
	}

}
