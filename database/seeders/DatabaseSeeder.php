<?php

namespace Database\Seeders;

use App\Models\EmailAddress;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PhoneNumberSeeder::class);
        $this->call(EmailAddressSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
