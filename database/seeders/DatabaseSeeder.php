<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // public function run()
    // {
    //     // \App\Models\User::factory(10)->create();
    // }

    public function run()
    {
        // Call UserSeeder to seed the users table
        $this->call(UserSeeder::class);
        // Call ProductSeeder to seed the products table
        //$this->call(ProductSeeder::class);

        
    }
}
