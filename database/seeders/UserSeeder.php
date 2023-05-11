<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(5)->create();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role' => 'Admin',
            'random_key' => Str::random(60)
        ]);
        User::create([
            'name' => 'Super',
            'email' => 'super@super.com',
            'password' => Hash::make('super'),
            'role' => 'Super',
            'random_key' => Str::random(60)
        ]);
    }
}
