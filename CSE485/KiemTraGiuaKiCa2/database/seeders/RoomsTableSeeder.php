<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $guestIds = DB::table('guests')->pluck('id')->toArray();
        $roomTypes = ['Single', 'Double', 'Suite'];
        $statuses = ['Occupied', 'Available', 'Maintenance'];
        for($i=0; $i<15 ; $i++){
            DB::table('rooms')->insert([
                'guest_id' => $faker->randomElement($guestIds),
                'room_number' => $faker->unique()->numerify('Room-###'),
                'room_type' => $faker->randomElement($roomTypes),
                'price_per_night' => $faker->randomFloat(2, 50, 500),
                'check_in_date' => $faker->date(),
                'check_out_date' => $faker->date(),
                'status' => $faker->randomElement($statuses),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
