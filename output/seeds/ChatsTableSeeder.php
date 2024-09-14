<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('chats')->insert([
            array (
  'id' => '21',
  'user1_id' => ' 2',
  'user2_id' => ' 1',
  'created_at' => ' \'2023-10-31 05:32:01',
  'updated_at' => ' \'2023-10-31 05:32:01',
),
            array (
  'id' => '32',
  'user1_id' => ' 3',
  'user2_id' => ' 2',
  'created_at' => ' \'2023-10-31 06:54:44',
  'updated_at' => ' \'2023-10-31 06:54:44',
),
        ]);
    }
}