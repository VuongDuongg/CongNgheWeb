<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class GuestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for($i=0; $i<5 ; $i++){
            DB::table('guests')->insert([
                'guest_name' =>$faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'nationality' => $faker -> country(),
                'id_number' => $faker -> unique() ->numerify('ID##########'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
