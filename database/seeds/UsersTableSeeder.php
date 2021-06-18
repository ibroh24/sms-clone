<?php

use Illuminate\Database\Seeder;
Use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'email' => 'ibroh24@gmail.com',
            'password' => bcrypt('password'),
            'name' => 'ibrahim'
        ]);
        
    }
}
