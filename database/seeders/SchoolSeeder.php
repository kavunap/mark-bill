<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = \Faker\Factory::create();
        DB::table("schools")->insert([
            "name" => "GS Kigeme",
            "location" => "Nyamagabe",
            "type" => "REB",
            "user_id" => User::find(2)->id,
            // "gender" => $faker->randomElement(["male", "female", "others"]),
            // "address_info" => $faker->address,
        ]);
    }
}
