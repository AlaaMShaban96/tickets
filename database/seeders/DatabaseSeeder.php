<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\DaySeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\TripSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PlaneSeeder;
use Database\Seeders\AirlineSeeder;
use Database\Seeders\AirportSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\SeatTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AirlineSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(DaySeeder::class);
        $this->call(AirportSeeder::class);
        $this->call(PlaneSeeder::class);
        $this->call(SeatTypeSeeder::class);
        $this->call(TripSeeder::class);
        $this->call(UserSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
