<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 0; $i < 15; $i++) {
            DB::table('books')->insert([
                'member_id' => $faker->numberBetween(1, 5),
                'title' => $faker->sentence(3),
                'author' => $faker->name(),
                'isbn' => $faker->unique()->isbn13(),
                'publication_year' => $faker->numberBetween(1990, 2023),
                'copies_available' => $faker->numberBetween(0, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
