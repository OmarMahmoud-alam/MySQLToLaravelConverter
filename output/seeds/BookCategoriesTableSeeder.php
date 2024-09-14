<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('book_categories')->insert([
            array (
  'book_id' => '1',
  'category_id' => ' 1',
),
            array (
  'book_id' => '1',
  'category_id' => ' 2',
),
            array (
  'book_id' => '1',
  'category_id' => ' 4',
),
            array (
  'book_id' => '2',
  'category_id' => ' 4',
),
            array (
  'book_id' => '3',
  'category_id' => ' 5',
),
            array (
  'book_id' => '3',
  'category_id' => ' 6',
),
            array (
  'book_id' => '3',
  'category_id' => ' 7',
),
            array (
  'book_id' => '4',
  'category_id' => ' 4',
),
            array (
  'book_id' => '4',
  'category_id' => ' 8',
),
            array (
  'book_id' => '5',
  'category_id' => ' 4',
),
            array (
  'book_id' => '5',
  'category_id' => ' 8',
),
            array (
  'book_id' => '6',
  'category_id' => ' 1',
),
            array (
  'book_id' => '6',
  'category_id' => ' 6',
),
            array (
  'book_id' => '6',
  'category_id' => ' 7',
),
            array (
  'book_id' => '7',
  'category_id' => ' 1',
),
            array (
  'book_id' => '7',
  'category_id' => ' 6',
),
            array (
  'book_id' => '7',
  'category_id' => ' 7',
),
            array (
  'book_id' => '8',
  'category_id' => ' 2',
),
            array (
  'book_id' => '8',
  'category_id' => ' 3',
),
            array (
  'book_id' => '9',
  'category_id' => ' 6',
),
            array (
  'book_id' => '9',
  'category_id' => ' 7',
),
            array (
  'book_id' => '10',
  'category_id' => ' 6',
),
            array (
  'book_id' => '10',
  'category_id' => ' 7',
),
            array (
  'book_id' => '11',
  'category_id' => ' 5',
),
            array (
  'book_id' => '11',
  'category_id' => ' 8',
),
            array (
  'book_id' => '11',
  'category_id' => ' 9',
),
            array (
  'book_id' => '12',
  'category_id' => ' 12',
),
            array (
  'book_id' => '13',
  'category_id' => ' 12',
),
            array (
  'book_id' => '14',
  'category_id' => ' 2',
),
            array (
  'book_id' => '14',
  'category_id' => ' 3',
),
        ]);
    }
}