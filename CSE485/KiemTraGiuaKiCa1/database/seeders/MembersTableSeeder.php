<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            DB::table('members')->insert([
                'member_code' => 'M' . ($i + 1),
                'fullname' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'membership_type' => $faker->randomElement(['Basic', 'Premium', 'VIP']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
