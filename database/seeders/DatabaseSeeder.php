<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check if the user already exists
        if (!User::where('email', 'chaman.sharma@samarth.ac.in')->exists()) {
            // Create the user only if it doesn't exist
            User::factory(1)->create();
        }

        // Check if the articles table is empty
        if (Article::count() == 0) {
            Article::factory(1000)->create(); // Runs only if no articles exist
        }

    }
}
