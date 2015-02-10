<?php
class PrioritySeeder
extends DatabaseSeeder
{
  public function run()
  {
    $priorities = [
      [ "name" => "Low" ],
      [ "name" => "Normal" ],
      [ "name" => "High" ],
      [ "name" => "Urgent" ]
    ];

    foreach ($priorities as $priority) {
      Priority::create($priority);
    }
  }
}
