<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(
          array(
            "username" => "monkeeboy",
            "password" => Hash::make("issues"),
            "email"    => "issues@monkee-boy.com"
          ),
          array(
            "username" => "demo",
            "password" => Hash::make("demo"),
            "email"    => "issues.demo@monkee-boy.com"
          ),
          array(
            "username" => "test",
            "password" => Hash::make("test"),
            "email"    => "issues.test@monkee-boy.com"
          )
        );
    }
}
