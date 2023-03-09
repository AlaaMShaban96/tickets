<?php

namespace Database\Seeders;

use App\Models\SeatType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeatType::insert([
            ["name" => "economy"],
            ["name" => "business class"],
        ]);

        DB::table('plane_seat_type')->insert([
            ['number' => 10, 'plane_id' => 1, "seat_type_id" => 2],
            ['number' => 30, 'plane_id' => 1, "seat_type_id" => 1],
        ]);

    }
}
