<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'=>"Alaa M Shaban",
                'email'=>"ala96ala96@gmail.com",
                'password'=>Hash::make("12345678"),
                'role'=>0
            ],
            [
                'name'=>"Nader",
                'email'=>"nader@gmail.com",
                'password'=>Hash::make("12345678"),
                'role'=>1
            ]
        ]);
    }
}
