<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('events')->insert([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'venue' => $faker->city,
                'event_date' => $faker->dateTimeBetween('+1 week', '+6 months')->format('Y-m-d'),
                'member_amount' => $faker->randomFloat(2, 10, 100),
                'nonmember_amount' => $faker->randomFloat(2, 20, 150),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
