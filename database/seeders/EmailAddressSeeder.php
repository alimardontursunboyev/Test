<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_addresses')->truncate();
        $array = array(
            [
                'user_id' => '1',
                'email_address' => 'abdullayevsarvar@mail.ru'
            ],
            [
                'user_id' => '1',
                'email_address' => 'abdullayevsarvar94@yandex.ru'
            ],
            [
                'user_id' => '1',
                'email_address' => 'sarvarabdullayev@gmail.com'
            ],
            [
                'user_id' => '2',
                'email_address' => 'mirkomilovgolib@gmail.com'
            ],
            [
                'user_id' => '3',
                'email_address' => 'qodirovruslan@gmail.com'
            ],
            [
                'user_id' => '3',
                'email_address' => 'ruslanqodirov98@mail.ru'
            ]
        );
        DB::table('email_addresses')->insert($array);
    }
}
