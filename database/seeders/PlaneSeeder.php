<?php

namespace Database\Seeders;

use App\Models\Plane;
use Illuminate\Database\Seeder;

class PlaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plane::create([
            "name" => "Airbus a321",
            "code" =>"321"
        ]);
    }
}
