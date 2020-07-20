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
        factory(\App\User::class)->create(['email' => 'mattbendel60@gmail.com', 'name' => 'Matt Bendel', 'password'=>'password']);
    }
}
