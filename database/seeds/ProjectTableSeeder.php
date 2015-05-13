<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Project;
use App\User;

class ProjectTableSeeder extends Seeder {

    public function run()
    {
        DB::table('projects')->delete();

        $projects = array(
          array(
            "title" => "Monkee-Boy",
            "designed_by" => "Steph",
            "developed_by" => "James & John",
            "url" => "http://monkee-boy.com",
            "slug" => "monkee-boy"
          ),
          array(
            "title" => "The Daily Bugle",
            "designed_by" => "Peter Parker",
            "developed_by" => "J. Jonah Jameson",
            "url" => "http://monkee-boy.com",
            "slug" => "the-daily-bugle"
          ),
          array(
            "title" => "Stark Industries",
            "designed_by" => "Pepper Potts",
            "developed_by" => "Tony Stark",
            "url" => "http://monkee-boy.com",
            "slug" => "stark-industries"
          )
        );

        foreach($projects as $project) {
          Project::create($project);
        }
    }
}
