<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $array = array(
            [
                'full_name' => 'Abdullayev Sarvar'
            ],
            [
                'full_name' => 'Mirkomilov, G`olib'
            ],
            [
                'full_name' => 'Qodirov Ruslan'
            ]
        );
        DB::table('users')->insert($array);
    }
}
