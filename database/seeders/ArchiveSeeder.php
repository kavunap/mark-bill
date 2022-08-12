<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\School;

class ArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("archives")->insert([
            "year" => 2021,
            "academic_year" => "2020-2021",
            "school_id" => School::find(1)->id,
        ]);
    }
}
