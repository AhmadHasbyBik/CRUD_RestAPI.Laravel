<?php

namespace Database\Seeders;

use App\Models\Shoe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0; $i<10; $i++){
            Shoe::create([
                'name' => $faker->name,
                'brand' => $faker->sentence,
                'type' => $faker->sentence
            ]);
        }
    }
}
