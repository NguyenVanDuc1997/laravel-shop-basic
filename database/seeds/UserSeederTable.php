<?php

use Illuminate\Database\Seeder;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->password = \Illuminate\Support\Facades\Hash::make("123456");
        $user->save();

        $user = new \App\User();
        $user->name = "user";
        $user->email = "user@gmail.com";
        $user->password = \Illuminate\Support\Facades\Hash::make("123456");
        $user->save();
    }
}
