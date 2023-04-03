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
                'check_in'=>"18:38:27",
                "adults_price" => 195,
                "children_price" => 195,
                'tax' => 1.5,
                'airline_id' => 1,
                "need_visa" => 1,
                "poilcy"=>"Refund and Date Change are done as per the following policies, Refund Amount= Refund Charge (as per airline policy + ShareTrip Convenience Fee), Date Change Amount= Date Change Fee (as per Airline Policy + ShareTrip Convenience Fee).",

            ],
            [
                "name" => "MT 23",
                "plane_id" => 1,
                "from_airport_id" => 2,
                "to_airport_id" => 1,
                "take_off_at" => "21:38:27",
                "landing_at" => "23:38:27",
                'check_in'=>"18:38:27",
                "adults_price" => 195,
                "children_price" => 195,
                'tax' => 1.5,
                'airline_id' => 1,
                "need_visa" => 1,
                "poilcy"=>"Refund and Date Change are done as per the following policies, Refund Amount= Refund Charge (as per airline policy + ShareTrip Convenience Fee), Date Change Amount= Date Change Fee (as per Airline Policy + ShareTrip Convenience Fee).",
            ],
        ]);

    }
}
