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
        	'name' => 'Jhark Markuz',
        	'email' => 'janjan@collect.com',
        	'username' => 'janjan',
        	'password' => '$2y$10$NalMGa7mbDzvnyRneeIJVeOUmfxZ96NgQWzEXBifIWcjQoCqRi9DS'
        ]);
    }
}
