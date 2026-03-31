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
            // Sitedeki ana kategori - tüm yazılar bu kategoride
            'Genel Yazılar',
            // Alt kategoriler (içeriğe göre sınıflandırma)
            'Kişisel Gelişim',
            'Çocuk Yetiştirme',
            'Aile ve İlişkiler',
            'Psikoloji ve Sağlık',
            'Eğitim',
            'Teknoloji ve Toplum',
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
