<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            array (
  'id' => '1',
  'user_id' => ' 1',
  'addresse_id' => ' 1',
  'name' => ' \'dark knight',
  'author' => ' \'margarita mix',
  'status' => ' \'مستعمل بحاله جيد',
  'price' => ' 20.000',
  'discription' => ' \'it\\\'s a good book about dark knight fight bad gang that want to control the work',
  'created_at' => ' \'2023-10-27 09:25:42',
  'updated_at' => ' \'2023-10-27 09:25:42',
),
            array (
  'id' => '2',
  'user_id' => ' 1',
  'addresse_id' => ' 2',
  'name' => ' \'رسائل سقطت من ساعي البريد',
  'author' => ' \'مش مه',
  'status' => ' \'مستعمل بحاله متوسط',
  'price' => ' 15.000',
  'discription' => ' \'تحدث عن قصة عدده شخصيات ركبوا القطر',
  'created_at' => ' \'2023-10-27 09:27:42',
  'updated_at' => ' \'2023-10-27 09:27:42',
),
            array (
  'id' => '3',
  'user_id' => ' 1',
  'addresse_id' => ' 2',
  'name' => ' \'سيلوجيات النمو للانسان',
  'author' => ' \'عالم عظيم',
  'status' => ' \'جديد',
  'price' => ' 30.000',
  'discription' => ' \'النسخ الاول من الكتاب بحاله متوسط لا يوجد ورق مفقود',
  'created_at' => ' \'2023-10-27 09:44:07',
  'updated_at' => ' \'2023-10-27 09:44:07',
),
            array (
  'id' => '4',
  'user_id' => ' 1',
  'addresse_id' => ' 2',
  'name' => ' \'الارض',
  'author' => ' \'يوسف الشريف',
  'status' => ' \'مستعمل بحاله جيد',
  'price' => ' 20.000',
  'discription' => ' \'كتاب يحكي عن الفلاحين فى زمن الاحتلال الانجليزي',
  'created_at' => ' \'2023-10-27 09:47:01',
  'updated_at' => ' \'2023-10-27 09:47:01',
),
            array (
  'id' => '5',
  'user_id' => ' 1',
  'addresse_id' => ' 2',
  'name' => ' \'الارض',
  'author' => ' \'يوسف الشريف',
  'status' => ' \'مستعمل بحاله جيد',
  'price' => ' 20.000',
  'discription' => ' \'كتاب يحكي عن الفلاحين فى زمن الاحتلال الانجليزي',
  'created_at' => ' \'2023-10-27 09:47:13',
  'updated_at' => ' \'2023-10-27 09:47:13',
),
            array (
  'id' => '6',
  'user_id' => ' 1',
  'addresse_id' => ' 1',
  'name' => ' \'احببت لاجئة',
  'author' => ' \'محمد المهد',
  'status' => ' \'جديد',
  'price' => ' 15.000',
  'discription' => ' \'كتاب يحكي عن الفلاحين فى زمن الاحتلال الانجليزي',
  'created_at' => ' \'2023-10-27 09:49:21',
  'updated_at' => ' \'2023-10-27 09:49:21',
),
            array (
  'id' => '7',
  'user_id' => ' 1',
  'addresse_id' => ' 1',
  'name' => ' \'فتاه الياقة الزرقاء',
  'author' => ' \'محمد النمس',
  'status' => ' \'جديد',
  'price' => ' 15.000',
  'discription' => ' \'كتاب يحكي عن فتاه زات ياقة زرقاء',
  'created_at' => ' \'2023-10-27 09:52:09',
  'updated_at' => ' \'2023-10-27 09:52:09',
),
            array (
  'id' => '8',
  'user_id' => ' 1',
  'addresse_id' => ' 2',
  'name' => ' \'قوة الثقة بالنفس',
  'author' => ' \'محمد الكاتب',
  'status' => ' \'جديد',
  'price' => ' 40.000',
  'discription' => ' \'كتاب يحكي عن ثقة بالنفس مع عزه النفس لدي الانسان',
  'created_at' => ' \'2023-10-27 09:54:34',
  'updated_at' => ' \'2023-10-27 09:54:34',
),
            array (
  'id' => '9',
  'user_id' => ' 1',
  'addresse_id' => ' 2',
  'name' => ' \'كيف تنشط ذاكرتك',
  'author' => ' \'محمد الكاتب',
  'status' => ' \'مستعمل بحاله متوسط',
  'price' => ' 35.000',
  'discription' => ' \'كتاب يحكي عن ثقة بالنفس مع  تنشيط الذاكره',
  'created_at' => ' \'2023-10-27 09:55:16',
  'updated_at' => ' \'2023-10-27 09:55:16',
),
            array (
  'id' => '10',
  'user_id' => ' 1',
  'addresse_id' => ' 1',
  'name' => ' \'الخروج عن النص',
  'author' => ' \'محمد العاقل',
  'status' => ' \'مستعمل بحاله متوسط',
  'price' => ' 30.000',
  'discription' => ' \'روايه عن الكاتب العبقري الفز الى مفيش منه اتنين',
  'created_at' => ' \'2023-10-27 09:56:31',
  'updated_at' => ' \'2023-10-27 09:56:31',
),
            array (
  'id' => '11',
  'user_id' => ' 2',
  'addresse_id' => ' 3',
  'name' => ' \'من سلسله تاريخ اسلامي',
  'author' => ' \'جرجي عثمان',
  'status' => ' \'مستعمل بحاله جيد',
  'price' => ' 20.000',
  'discription' => ' \'كتاب عن تاريخ الاسلامي العام منهج اهل السنه',
  'created_at' => ' \'2023-10-27 11:27:53',
  'updated_at' => ' \'2023-10-27 11:27:53',
),
            array (
  'id' => '12',
  'user_id' => ' 2',
  'addresse_id' => ' 3',
  'name' => ' \'شطرنج للجميع',
  'author' => ' \'عمر محمود',
  'status' => ' \'فاقد بعض الورق',
  'price' => ' 30.000',
  'discription' => ' \'كتاب تعلم الشطرنج',
  'created_at' => ' \'2023-10-27 12:42:54',
  'updated_at' => ' \'2023-10-27 12:42:54',
),
            array (
  'id' => '13',
  'user_id' => ' 2',
  'addresse_id' => ' 3',
  'name' => ' \'خروج عن النص',
  'author' => ' \'عمر محمد',
  'status' => ' \'فاقد بعض الورق',
  'price' => ' 35.000',
  'discription' => ' \'احلى روايه سبب البيع عايز غيري يستمع بالروايه كمان',
  'created_at' => ' \'2023-10-27 12:44:17',
  'updated_at' => ' \'2023-10-27 12:44:17',
),
            array (
  'id' => '14',
  'user_id' => ' 2',
  'addresse_id' => ' 3',
  'name' => ' \'شطرنج للجميع',
  'author' => ' \'ايةي',
  'status' => ' \'مستعمل بحاله جيد',
  'price' => ' 35.000',
  'discription' => ' \'استني. بنب لا يمكن أن يكون فى طريق دفع بفودافون',
  'created_at' => ' \'2023-10-27 12:59:44',
  'updated_at' => ' \'2023-10-27 12:59:44',
),
        ]);
    }
}