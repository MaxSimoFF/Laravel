<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1;$i <= 50;$i++) {
            Doctor::create([
                'name' => $faker->name(),
                'gender' => $faker->randomElement(['male', 'femail']),
                'address' => $faker->address,
                'hospital_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
