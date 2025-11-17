<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(30)->create(); //30 tane user oluştur
        // Category::factory(0)->create(); //10 tane category oluştur
        // Todo::factory(300)->create(); 100 tane todo oluştur

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TodoSeeder::class,
        ]);
    }
}
