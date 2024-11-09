<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Log::info('Seeding users...');
        User::factory(5)->create()->each(function($user){
            Log::info('Creating task for user: '. $user->id);
            Task::factory(5)->create(['user_id' => $user->id]);
        });
        Log::info('Seeding completed.');
    }
}
