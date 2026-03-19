<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Dini Bilgiler',
            'Çocuk Yetiştirme',
            'Aile İletişimi',
            'Kişisel Gelişim',
            'Manevi Yazılar',
            'Genel'
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category],
                ['slug' => Str::slug($category)]
            );
        }
    }
}
