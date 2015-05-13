<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $users = array(
          array(
            "name" => "Monkee-Boy",
            "password" => Hash::make("issues"),
            "email" => "issues@monkee-boy.com"
          ),
          array(
            "name" => "Issues Demo",
            "password" => Hash::make("demo"),
            "email" => "issues.demo@monkee-boy.com"
          ),
          array(
            "name" => "James Fleeting",
            "password" => Hash::make("issues"),
            "email" => "james@monkee-boy.com"
          )
        );

        foreach($users as $user) {
          User::create($user);
        }
    }
}
