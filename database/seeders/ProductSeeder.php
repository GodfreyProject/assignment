<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Insert multiple product records into the 'products' table
        DB::table('products')->insert([
            [
                'name' => 'Laptop',
                'price' => 1500.00,
                'stock' => 75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smartphone',
                'price' => 800.00,
                'stock' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Headphones',
                'price' => 100.00,
                'stock' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Canon Camera',
                'price' => 250.00,
                'stock' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    }

