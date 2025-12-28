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
        for ($i = 0; $i < 10; $i++) {
            DB::table('students')->insert([
                'class_id' => $faker->numberBetween(1, 3),
                'student_code' => 'SV' . $faker->unique()->numberBetween(1000, 9999),
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'date_of_birth' => $faker->date('Y-m-d', '2005-01-01'),
                'address' => $faker->address(),
                'gender' => $faker->randomElement(['Nam', 'Nữ', 'Khác']),
                'status' => $faker->randomElement(['Đang học', 'Nghỉ học', 'Tốt nghiệp']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
}
