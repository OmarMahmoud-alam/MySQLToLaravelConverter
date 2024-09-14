<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalAccessTokensTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('personal_access_tokens')->insert([
            array (
  'id' => '4',
  'tokenable_type' => ' \'App\\\\Models\\\\User',
  'tokenable_id' => ' 3',
  'name' => ' \'Personal Access Token',
  'token' => ' \'a8e830bb1bd850640ab5c3fd455a860ba944f6066231274100d47a2292028029',
  'abilities' => ' \'[\\"*\\"]',
  'last_used_at' => ' \'2023-10-31 07:01:53',
  'expires_at' => ' NULL',
  'created_at' => ' \'2023-10-31 06:49:13',
  'updated_at' => ' \'2023-10-31 07:01:53',
),
            array (
  'id' => '5',
  'tokenable_type' => ' \'App\\\\Models\\\\User',
  'tokenable_id' => ' 1',
  'name' => ' \'Personal Access Token',
  'token' => ' \'2c186845794c388c6b36a8b22606a30b4ed3c9d46646bf8f4dee03d97068679f',
  'abilities' => ' \'[\\"*\\"]',
  'last_used_at' => ' \'2023-10-31 07:14:37',
  'expires_at' => ' NULL',
  'created_at' => ' \'2023-10-31 07:14:36',
  'updated_at' => ' \'2023-10-31 07:14:37',
),
            array (
  'id' => '6',
  'tokenable_type' => ' \'App\\\\Models\\\\User',
  'tokenable_id' => ' 1',
  'name' => ' \'Personal Access Token',
  'token' => ' \'c9a5fb1cfed84079e79b29e24ade6a4a1fb4283574aaa870f02e7d73ecdcadcb',
  'abilities' => ' \'[\\"*\\"]',
  'last_used_at' => ' \'2023-10-31 07:52:23',
  'expires_at' => ' NULL',
  'created_at' => ' \'2023-10-31 07:14:37',
  'updated_at' => ' \'2023-10-31 07:52:23',
),
            array (
  'id' => '7',
  'tokenable_type' => ' \'App\\\\Models\\\\User',
  'tokenable_id' => ' 4',
  'name' => ' \'Personal Access Token',
  'token' => ' \'75b0c52d15882c34492d306efd850e03aaac15d2b3073cc0db83752f42460298',
  'abilities' => ' \'[\\"*\\"]',
  'last_used_at' => ' NULL',
  'expires_at' => ' NULL',
  'created_at' => ' \'2023-11-28 11:34:53',
  'updated_at' => ' \'2023-11-28 11:34:53',
),
            array (
  'id' => '8',
  'tokenable_type' => ' \'App\\\\Models\\\\User',
  'tokenable_id' => ' 5',
  'name' => ' \'Personal Access Token',
  'token' => ' \'1967976c606ba56f3b53b3902ca64760e3866441362f5d620bb4a832148ad655',
  'abilities' => ' \'[\\"*\\"]',
  'last_used_at' => ' NULL',
  'expires_at' => ' NULL',
  'created_at' => ' \'2023-11-28 12:43:49',
  'updated_at' => ' \'2023-11-28 12:43:49',
),
            array (
  'id' => '9',
  'tokenable_type' => ' \'App\\\\Models\\\\User',
  'tokenable_id' => ' 6',
  'name' => ' \'Personal Access Token',
  'token' => ' \'c8491e8324cd3a9c21a59e067daebb538f75d721a90b36b35c783875b002afe4',
  'abilities' => ' \'[\\"*\\"]',
  'last_used_at' => ' NULL',
  'expires_at' => ' NULL',
  'created_at' => ' \'2023-11-28 12:44:21',
  'updated_at' => ' \'2023-11-28 12:44:21',
),
            array (
  'id' => '10',
  'tokenable_type' => ' \'App\\\\Models\\\\User',
  'tokenable_id' => ' 7',
  'name' => ' \'Personal Access Token',
  'token' => ' \'e34d17fcdfb1afcf10f6342fd34c9b193e1574ff31271bd9f8162517f751f557',
  'abilities' => ' \'[\\"*\\"]',
  'last_used_at' => ' NULL',
  'expires_at' => ' NULL',
  'created_at' => ' \'2023-11-28 13:07:19',
  'updated_at' => ' \'2023-11-28 13:07:19',
),
        ]);
    }
}