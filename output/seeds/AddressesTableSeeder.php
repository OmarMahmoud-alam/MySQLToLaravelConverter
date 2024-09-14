<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('addresses')->insert([
            array (
  'user_id' => '1',
  'id' => ' 1',
  'long' => ' 31.6055666',
  'lat' => ' 31.0990991',
  'created_at' => ' \'2023-10-27 09:24:19',
  'updated_at' => ' \'2023-10-27 09:24:19',
),
            array (
  'user_id' => '1',
  'id' => ' 2',
  'long' => ' 31.6055666',
  'lat' => ' 30.0990991',
  'created_at' => ' \'2023-10-27 09:25:30',
  'updated_at' => ' \'2023-10-27 09:25:30',
),
            array (
  'user_id' => '2',
  'id' => ' 3',
  'long' => ' 31.6055666',
  'lat' => ' 31.0990991',
  'created_at' => ' \'2023-10-27 11:26:15',
  'updated_at' => ' \'2023-10-27 11:26:15',
),
        ]);
    }
}