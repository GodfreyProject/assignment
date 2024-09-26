<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // Insert multiple user records into the 'users' table
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'password' => Hash::make('password123'), // Encrypt the password
                'address' => '1234 Main St, Springfield',
                'contact_number' => '555-555-5555',
                'other_details' => 'First-time customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'password' => Hash::make('password456'),
                'address' => '5678 Oak St, Springfield',
                'contact_number' => '555-666-7777',
                'other_details' => 'Frequent buyer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alicejohnson@example.com',
                'password' => Hash::make('password789'),
                'address' => '9101 Pine St, Springfield',
                'contact_number' => '555-888-9999',
                'other_details' => 'VIP member',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    }

