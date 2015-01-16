<?php
class UserSeeder
extends DatabaseSeeder
{
  public function run()
  {
    $users = [
      [
        "username" => "monkeeboy",
        "password" => Hash::make("issues"),
        "email"    => "issues@monkee-boy.com"
      ],
      [
        "username" => "demo",
        "password" => Hash::make("demo"),
        "email"    => "issues.demo@monkee-boy.com"
      ],
      [
        "username" => "test",
        "password" => Hash::make("test"),
        "email"    => "issues.test@monkee-boy.com"
        ]
    ];

    foreach ($users as $user) {
      User::create($user);
    }
  }
}
