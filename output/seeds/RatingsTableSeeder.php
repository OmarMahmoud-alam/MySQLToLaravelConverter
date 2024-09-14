<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ratings')->insert([
            array (
  'user_id' => '2',
  'seller_id' => ' 1',
  'rating' => ' 3',
  'comment' => ' NULL',
  'created_at' => ' \'2023-10-27 10:09:29',
  'updated_at' => ' \'2023-10-27 12:51:01',
),
        ]);
    }
}