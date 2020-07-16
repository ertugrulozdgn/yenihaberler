<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Ertuğrul Özdoğan",
            "role" => "admin",
            "status" => "1",
            "email" => "ozdgnertugrul@gmail.com",
            "password" => bcrypt('123')
        ]);
    }
}
