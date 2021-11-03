<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Thien",
            'email' => "Thien@a.com",
            'password' => bcrypt('1234'),
            'image' => 'user_image/Thien.png'
        ]);
        DB::table('users')->insert([
            'name' => "Paul",
            'email' => "Paul@a.com",
            'password' => bcrypt('1234'),
            'image' => 'user_image/Paul.jpg'
        ]);
        DB::table('users')->insert([
            'name' => "Pauline",
            'email' => "Pauline@a.com",
            'password' => bcrypt('1234'),
            'image' => 'user_image/Pauline.jpg'
        ]);
        DB::table('users')->insert([
            'name' => "John",
            'email' => "John@a.com",
            'password' => bcrypt('1234'),
            'image' => 'user_image/John.jpg'
        ]);
    }
}
