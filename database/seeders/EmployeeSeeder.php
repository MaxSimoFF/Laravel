<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,50) as $index) {
            Employee::create([
                'first_name'    => $faker->firstName(),
                'last_name'     => $faker->lastName,
                'age'           => $faker->numberBetween(18, 50),
                'email_address' => $faker->email,
            ]);
        }
    }
}
