<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Customer;
use App\Models\User;
use App\Models\Zone;
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
        User::factory(3)->create();
        Customer::factory(7)->create();
    }
}
