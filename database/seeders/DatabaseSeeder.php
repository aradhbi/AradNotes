<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Category;
use App\Models\Interest;
use App\Models\Skill;
use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create([
            'email' => 'aradhabibi1387@gmail.com',
            'password' => 'aradHabibi1387+*!',
            "role" => 'admin',
        ]);


    }
}
