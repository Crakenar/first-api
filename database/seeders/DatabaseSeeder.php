<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseSeeder extends Seeder
{
    use RefreshDatabase;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
             UserSeeder::class,
             //You need to let Author Seeder first bc BookSeeder use Author table to fill author-id
             AuthorSeeder::class,
             BookSeeder::class,
         ]);
    }
}
