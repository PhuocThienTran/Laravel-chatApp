<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/* Messages seeder page: init the messages table and create base data for the db */

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'user_id' => '1',
            'message' => 'Artsy right?',
            'image' => 'message_image/m1.jpg',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('messages')->insert([
            'user_id' => '2',
            'message' => 'Yup! What about mines?',
            'image' => 'message_image/m2.jpg',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('messages')->insert([
            'user_id' => '1',
            'message' => '100% Here\'s one too!',
            'image' => 'message_image/m3.jpg',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('messages')->insert([
            'user_id' => '3',
            'message' => 'Here\'s what I found to be cool!',
            'image' => 'message_image/m4.jpg',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
        
    }
}
