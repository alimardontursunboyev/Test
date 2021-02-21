<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phone_numbers')->truncate();
        $array = array(
            [
                'user_id' => '1',
                'phone_number' => '+998991234567'
            ],
            [
                'user_id' => '1',
                'phone_number' => '+998991112233'
            ],
            [
                'user_id' => '2',
                'phone_number' => '+998934561237'
            ],
            [
                'user_id' => '2',
                'phone_number' => '+998937894561'
            ],
            [
                'user_id' => '2',
                'phone_number' => '+998931236547'
            ],
            [
                'user_id' => '3',
                'phone_number' => '+998939638527'
            ]
        );
        DB::table('phone_numbers')->insert($array);
    }
}
