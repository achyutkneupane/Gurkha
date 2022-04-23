<?php

namespace Database\Seeders;

use App\Models\Detail;
use App\Models\Update;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gurkha.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Staff',
            'email' => 'staff@gurkha.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'staff',
        ]);
        \App\Models\User::factory(10)->create();
        $updates = Update::factory(20)->make();
        $admin->news()->saveMany($updates);
        $this->call(DetailSeeder::class);
    }
}
