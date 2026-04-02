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
            'Genel Yazılar',
            'Kişisel Gelişim',
            'Çocuk Yetiştirme',
            'Aile ve İlişkiler',
            'Psikoloji ve Sağlık',
            'Manevi Yazılar',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category],
                ['slug' => Str::slug($category)]
            );
        }
    }
}
