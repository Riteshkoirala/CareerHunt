<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Profile\UserProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
         \App\Models\User::create([
             'id' => 1,
             'email' => 'admin@admin.gmail.com',
             'email_verified_at' => now(),
             'password'=> bcrypt('5%2#4!6&'),
             'is_admin'=>1,
         ]);
         UserProfile::create([
            'firstname' => 'Ritesh',
            'lastname' => 'Koirala',
            'skills' => 'PHP,JS'
         ]);
    }
}
