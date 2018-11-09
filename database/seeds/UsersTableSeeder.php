<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'John Doe',
            'email'=>'john.doe@gmail.com',
            'password'=>bcrypt('secret'),
            'isAdmin'=>0
        ]);
        \App\User::create([
            'name'=>'Jane Doe',
            'email'=>'jane.doe@gmail.com',
            'password'=>bcrypt('secret')
        ]);
    }
}
