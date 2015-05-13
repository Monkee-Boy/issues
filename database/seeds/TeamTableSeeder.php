<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Team;

class TeamTableSeeder extends Seeder {

    public function run()
    {
        DB::table('teams')->delete();

        $teams = array(
          array(
            "name" => "Design",
            "color" => "#fff"
          ),
          array(
            "name" => "Development",
            "color" => "#ccc"
          ),
          array(
            "name" => "Content",
            "color" => "#333"
          ),
          array(
            "name" => "Marketing",
            "color" => "#0000cc"
          )
        );

        foreach($teams as $team) {
          Team::create($team);
        }
    }
}
