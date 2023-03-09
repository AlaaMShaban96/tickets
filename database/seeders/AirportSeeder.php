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
            ["name" => "معيتيقه", "county_id" => 1],
            ["name" => "مالطا", "county_id" => 2],
        ]);
    }
}
