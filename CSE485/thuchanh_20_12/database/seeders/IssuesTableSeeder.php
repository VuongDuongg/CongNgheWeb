<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 50),
                'description' => $faker->sentence(),
                'reported_by' => $faker-> word(),
                'reported_at' => $faker->dateTimeBetween('-1 year', 'now'),  
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In_progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
}
