<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MigrationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('migrations')->insert([
            array (
  'id' => '1',
  'migration' => ' \'2014_10_12_000000_create_users_table',
  'batch' => ' 1',
),
            array (
  'id' => '2',
  'migration' => ' \'2014_10_12_100000_create_password_reset_tokens_table',
  'batch' => ' 1',
),
            array (
  'id' => '3',
  'migration' => ' \'2019_08_19_000000_create_failed_jobs_table',
  'batch' => ' 1',
),
            array (
  'id' => '4',
  'migration' => ' \'2019_12_14_000001_create_personal_access_tokens_table',
  'batch' => ' 1',
),
            array (
  'id' => '5',
  'migration' => ' \'2023_09_30_124028_create_categories_table',
  'batch' => ' 1',
),
            array (
  'id' => '6',
  'migration' => ' \'2023_09_30_164143_create_books_table',
  'batch' => ' 1',
),
            array (
  'id' => '7',
  'migration' => ' \'2023_09_30_165428_create_book_categories_table',
  'batch' => ' 1',
),
            array (
  'id' => '8',
  'migration' => ' \'2023_09_30_173659_create_ratings_table',
  'batch' => ' 1',
),
            array (
  'id' => '11',
  'migration' => ' \'2023_10_01_164514_create_favourites_table',
  'batch' => ' 2',
),
            array (
  'id' => '12',
  'migration' => ' \'2014_10_12_200000_add_two_factor_columns_to_users_table',
  'batch' => ' 3',
),
            array (
  'id' => '13',
  'migration' => ' \'2019_05_11_000000_create_otps_table',
  'batch' => ' 4',
),
            array (
  'id' => '16',
  'migration' => ' \'2023_10_05_133656_create_chats_table',
  'batch' => ' 5',
),
            array (
  'id' => '17',
  'migration' => ' \'2023_10_05_133712_create_messagechats_table',
  'batch' => ' 5',
),
            array (
  'id' => '18',
  'migration' => ' \'2023_10_06_115119_create_events_table',
  'batch' => ' 6',
),
            array (
  'id' => '19',
  'migration' => ' \'2023_10_06_115208_create_event_comments_table',
  'batch' => ' 6',
),
            array (
  'id' => '20',
  'migration' => ' \'2023_10_06_115231_create_event_interests_table',
  'batch' => ' 7',
),
            array (
  'id' => '21',
  'migration' => ' \'2023_9_29_164530_create_addresses_table',
  'batch' => ' 8',
),
            array (
  'id' => '22',
  'migration' => ' \'2023_10_07_140057_create_photos_table',
  'batch' => ' 9',
),
        ]);
    }
}