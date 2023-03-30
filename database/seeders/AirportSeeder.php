<?php

namespace Database\Seeders;

use App\Models\Airport;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Airport::insert([
            ["name" => "Mitiga  airport", "country_id" => 1],
            ["name" => "Malta  airport", "country_id" => 2],
        ]);
    }
}
