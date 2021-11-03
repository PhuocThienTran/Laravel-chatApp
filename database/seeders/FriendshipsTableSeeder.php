<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriendshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friendships')->insert([
            'user_id' => '1',   //Thien
            'friendship_user_id' => '2',    //Paul
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
        
        DB::table('friendships')->insert([
            'user_id' => '1',   //Thien
            'friendship_user_id' => '3',    //Pauline
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('friendships')->insert([
            'user_id' => '1',   //Thien
            'friendship_user_id' => '4',    //John
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);


        DB::table('friendships')->insert([
            'user_id' => '2',   //Paul
            'friendship_user_id' => '1',    //Thien
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('friendships')->insert([
            'user_id' => '3',   //Pauline
            'friendship_user_id' => '1',    //Thien
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
