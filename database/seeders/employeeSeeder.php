<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\Employee;
use Faker\Factory as Faker;

class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $category = category::all();
        foreach ($category as $categories) {
            $random = $category->random();
            Employee::create([
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'mail' => $faker->unique()->safeEmail,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'category_id' => $random->id
            ]);
        }
    }
}
