<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::insert([
            ["name" => "Sunday", "code" => "0"],
            ["name" => "Monday", "code" => "1"],
            ["name" => "Tuesday", "code" => "2"],
            ["name" => "Wednesday", "code" => "3"],
            ["name" => "Thursday", "code" => "4"],
            ["name" => "Friday", "code" => "5"],
            ["name" => "Saturday", "code" => "6"],
        ]);

        DB::table('day_trip')->insert([
            ['day_id' => 1, 'trip_id' => 1],
            ['day_id' => 2, 'trip_id' => 1],
            ['day_id' => 3, 'trip_id' => 1],
            ['day_id' => 4, 'trip_id' => 2],
            ['day_id' => 5, 'trip_id' => 2],
            ['day_id' => 6, 'trip_id' => 2],
        ]);
    }
}
