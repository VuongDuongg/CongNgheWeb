<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $SchoolIds = DB::table('schools')->pluck('id')->toArray();

         for ($i = 0; $i < 20; $i++) {
            DB::table('students')->insert([
                'school_id' => $faker->randomElement($SchoolIds),
                'full_name' => $faker->name(),
                'student_id' => $faker->unique()->numerify('S#######'),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
