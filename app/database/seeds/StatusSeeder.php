<?php
class StatusSeeder
extends DatabaseSeeder
{
  public function run()
  {
    $statuses = [
      [ "name" => "New" ],
      [ "name" => "Pending" ],
      [ "name" => "Complete" ],
      [ "name" => "Verified" ],
      [ "name" => "No Fix" ]
    ];

    foreach ($statuses as $status) {
      Status::create($status);
    }
  }
}
