<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::create([
            'name' => 'First Hotel',
            'email' => 'hotel@hotel.com',
            'country' => 'Morocco',
            'city' => 'Meknes',
            'address' => 'Address Address Address Address Address Address',
            'phone' => '1234567890',
            'stars' => '5',
        ]);
    }
}
