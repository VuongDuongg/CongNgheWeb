<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 0; $i < 3; $i++) {
            DB::table('classes')->insert([
                'class_code' => 'CSE' . $faker->unique()->numberBetween(1, 3),
                'class_name' => 'Lớp ' . $faker->word(),
                'semester' => $faker->numberBetween(1, 2),
                'academic_year' => $faker->numberBetween(2018, 2024) . '-' . $faker->numberBetween(2019, 2025),
                'advisor' => $faker->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
