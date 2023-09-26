<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Profile\UserProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'email' => 'admin@admin.gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('5%2#4!6&'),
            'is_admin' => 1,
        ]);
        UserProfile::create([
            'user_id' => 1,
            'firstname' => 'Ritesh',
            'lastname' => 'Koirala',
            'skills' => 'PHP,JS'
        ]);
        $sqlFilePath = database_path('seeders/assessments.sql');

        // Check if the SQL file exists
        if (File::exists($sqlFilePath)) {
            // Read the SQL file content
            $sqlContent = File::get($sqlFilePath);

            // Execute the SQL statements
            DB::unprepared($sqlContent);

            $this->command->info('SQL statements from assessments.sql executed successfully.');
        } else {
            $this->command->error('SQL file assessments.sql not found.');
        }
    }
}
