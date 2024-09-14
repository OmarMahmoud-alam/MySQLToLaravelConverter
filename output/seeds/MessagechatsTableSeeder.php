<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagechatsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('messagechats')->insert([
            array (
  'sender_id' => '2',
  'reciever_id' => ' 1',
  'chat_id' => ' 21',
  'message' => ' \'rh',
  'created_at' => ' \'2023-10-31 05:32:01',
  'updated_at' => ' \'2023-10-31 05:32:01',
),
            array (
  'sender_id' => '3',
  'reciever_id' => ' 2',
  'chat_id' => ' 32',
  'message' => ' \'hi',
  'created_at' => ' \'2023-10-31 06:54:44',
  'updated_at' => ' \'2023-10-31 06:54:44',
),
            array (
  'sender_id' => '3',
  'reciever_id' => ' 2',
  'chat_id' => ' 32',
  'message' => ' \'how are you',
  'created_at' => ' \'2023-10-31 06:55:04',
  'updated_at' => ' \'2023-10-31 06:55:04',
),
            array (
  'sender_id' => '2',
  'reciever_id' => ' 3',
  'chat_id' => ' 32',
  'message' => ' \'ok',
  'created_at' => ' \'2023-10-31 06:55:39',
  'updated_at' => ' \'2023-10-31 06:55:39',
),
            array (
  'sender_id' => '2',
  'reciever_id' => ' 3',
  'chat_id' => ' 32',
  'message' => ' \'ok how about you',
  'created_at' => ' \'2023-10-31 06:55:55',
  'updated_at' => ' \'2023-10-31 06:55:55',
),
            array (
  'sender_id' => '3',
  'reciever_id' => ' 2',
  'chat_id' => ' 32',
  'message' => ' \'I am good',
  'created_at' => ' \'2023-10-31 06:59:02',
  'updated_at' => ' \'2023-10-31 06:59:02',
),
            array (
  'sender_id' => '2',
  'reciever_id' => ' 3',
  'chat_id' => ' 32',
  'message' => ' \'oh yes',
  'created_at' => ' \'2023-10-31 07:00:05',
  'updated_at' => ' \'2023-10-31 07:00:05',
),
            array (
  'sender_id' => '3',
  'reciever_id' => ' 2',
  'chat_id' => ' 32',
  'message' => ' \'nonono',
  'created_at' => ' \'2023-10-31 07:00:12',
  'updated_at' => ' \'2023-10-31 07:00:12',
),
            array (
  'sender_id' => '2',
  'reciever_id' => ' 3',
  'chat_id' => ' 32',
  'message' => ' \'ok',
  'created_at' => ' \'2023-10-31 07:11:56',
  'updated_at' => ' \'2023-10-31 07:11:56',
),
        ]);
    }
}