<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trip::insert([
            [
                "name" => "MT 23",
                "plane_id" => 1,
                "from_airport_id" => 1,
                "to_airport_id" => 2,
                "take_off_at" => "21:38:27",
                "landing_at" => "23:38:27",
                "adults_price" => 1,
                "children_price" => 0,
                "need_visa" => 1,
            ],
            [
                "name" => "MT 23",
                "plane_id" => 1,
                "from_airport_id" => 2,
                "to_airport_id" => 1,
                "take_off_at" => "21:38:27",
                "landing_at" => "23:38:27",
                "adults_price" => 1,
                "children_price" => 0,
                "need_visa" => 1,
            ],
        ]);
        DB::table('seats')->insert([
            ['number' => 10, "available" => 10, 'trip_id' => 1, "seat_type_id" => 2],
            ['number' => 10, "available" => 30, 'trip_id' => 1, "seat_type_id" => 1],
        ]);

    }
}
