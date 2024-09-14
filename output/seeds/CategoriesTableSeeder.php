<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            array (
  'id' => '1',
  'name' => ' \'رومانسي',
),
            array (
  'id' => '2',
  'name' => ' \'رعب',
),
            array (
  'id' => '3',
  'name' => ' \'روايات قصير',
),
            array (
  'id' => '4',
  'name' => ' \'روايات طويل',
),
            array (
  'id' => '5',
  'name' => ' \'قصص جيب',
),
            array (
  'id' => '6',
  'name' => ' \'اكشن',
),
            array (
  'id' => '7',
  'name' => ' \'غموض',
),
            array (
  'id' => '8',
  'name' => ' \'تاريخي',
),
            array (
  'id' => '9',
  'name' => ' \'دين',
),
            array (
  'id' => '10',
  'name' => ' \'فقه',
),
            array (
  'id' => '11',
  'name' => ' \'طبي',
),
            array (
  'id' => '12',
  'name' => ' \'هندسي',
),
        ]);
    }
}