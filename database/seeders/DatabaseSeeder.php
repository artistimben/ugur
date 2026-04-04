<?php

namespace Database\Seeders;

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
        // Temiz bir başlangıç için eski verileri siliyoruz
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \App\Models\Post::truncate();
        \App\Models\Category::truncate();
        \App\Models\Page::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $this->call([
            AdminUserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            PageSeeder::class,
        ]);
    }
}
