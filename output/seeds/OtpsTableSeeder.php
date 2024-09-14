<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtpsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('otps')->insert([
            array (
  'id' => '1',
  'identifier' => ' \'omar.freecourse@gmail.com',
  'token' => ' \'569114',
  'validity' => ' 60',
  'valid' => ' 0',
  'created_at' => ' \'2023-10-27 09:21:37',
  'updated_at' => ' \'2023-10-27 09:22:14',
),
            array (
  'id' => '2',
  'identifier' => ' \'test@g.com',
  'token' => ' \'620032',
  'validity' => ' 60',
  'valid' => ' 0',
  'created_at' => ' \'2023-10-27 10:09:04',
  'updated_at' => ' \'2023-10-27 10:09:18',
),
            array (
  'id' => '3',
  'identifier' => ' \'anas.allam567@gmail.com',
  'token' => ' \'978023',
  'validity' => ' 60',
  'valid' => ' 0',
  'created_at' => ' \'2023-10-31 06:49:14',
  'updated_at' => ' \'2023-10-31 06:49:48',
),
            array (
  'id' => '4',
  'identifier' => ' \'test1ssaa0@test.com',
  'token' => ' \'518072',
  'validity' => ' 60',
  'valid' => ' 1',
  'created_at' => ' \'2023-11-28 12:43:49',
  'updated_at' => ' \'2023-11-28 12:43:49',
),
            array (
  'id' => '5',
  'identifier' => ' \'test1ssasa0@test.com',
  'token' => ' \'864159',
  'validity' => ' 60',
  'valid' => ' 1',
  'created_at' => ' \'2023-11-28 12:44:22',
  'updated_at' => ' \'2023-11-28 12:44:22',
),
            array (
  'id' => '6',
  'identifier' => ' \'test1iisa0@test.com',
  'token' => ' \'916067',
  'validity' => ' 60',
  'valid' => ' 1',
  'created_at' => ' \'2023-11-28 13:07:19',
  'updated_at' => ' \'2023-11-28 13:07:19',
),
        ]);
    }
}