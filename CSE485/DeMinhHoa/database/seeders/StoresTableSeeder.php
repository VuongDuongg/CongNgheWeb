<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            DB::table('stores')->insert([
                'name' => $faker->unique()->company,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]); 
        
    }
}
}
