<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Contact::truncate();
        $data = [
            'firstname'=>'てすと',
            'lastname'=>'てすと',
            'firstname_kana'=>'テスト',
            'lastname_kana'=>'テスト',
            'gender'=>'1',
            'birth_date'=>'2017-08-03',
            'telno_1'=>'0123-456-789',
            'telno_2'=>'',
            'telno_3'=>'',
            'title'=>'タイトル',
            'body'=>'あれは何ですか'
        ];
        for($i=0;$i<10;$i++){
            App\Contact::create($data);
        }
    }
}
