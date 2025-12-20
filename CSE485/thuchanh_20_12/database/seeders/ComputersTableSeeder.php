<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word(),
                'model' => $faker->randomElement(['Dell XPS 13', 'MacBook Pro', 'HP Spectre x360', 'Lenovo ThinkPad X1']),
                'operating_system' => $faker->randomElement(['Windows', 'macOS', 'Linux']),
                'processor' => $faker->randomElement(['Intel i5', 'Intel i7', 'AMD Ryzen 5', 'AMD Ryzen 7']),
                'memory' => $faker->randomElement([8, 16, 32, 64]),
                'available' => $faker->boolean(70),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
