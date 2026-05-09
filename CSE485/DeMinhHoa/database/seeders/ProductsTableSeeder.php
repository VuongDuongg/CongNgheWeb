<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $storeIds = DB::table('stores')->pluck('id')->toArray();
        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'store_id' => $faker->randomElement($storeIds),
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 5, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
}
