<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word(), // tên thuốc
                'brand' => $faker->company(), // hãng sản xuất
                'dosage' => $faker->randomElement(['500mg', '250mg', '100mg']),
                'form' => $faker->randomElement(['tablet', 'capsule', 'syrup']),
                'price' => $faker->randomFloat(2, 10, 500), // giá từ 10 đến 500
                'stock' => $faker->numberBetween(0, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
