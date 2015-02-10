<?php
class TeamSeeder
extends DatabaseSeeder
{
  public function run()
  {
    $teams = [
      [
        "name" => "Development",
        "color" => "#cc0000"
      ],
      [
        "name" => "Design",
        "color" => "#00cc00"
      ],
      [
        "name" => "Content",
        "color" => "#0000cc"
      ]
    ];

    foreach ($teams as $team) {
      Team::create($team);
    }
  }
}
