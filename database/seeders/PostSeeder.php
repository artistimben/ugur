<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Kategorileri oluştur/bul
        $catGenel   = Category::firstOrCreate(['name' => 'Genel Yazılar'],          ['slug' => 'genel-yazilar']);
        $catGelisim = Category::firstOrCreate(['name' => 'Kişisel Gelişim'],        ['slug' => 'kisisel-gelisim']);
        $catCocuk   = Category::firstOrCreate(['name' => 'Çocuk Yetiştirme'],       ['slug' => 'cocuk-yetistirme']);
        $catAile    = Category::firstOrCreate(['name' => 'Aile ve İlişkiler'],      ['slug' => 'aile-ve-iliskiler']);
        $catPsiko   = Category::firstOrCreate(['name' => 'Psikoloji ve Sağlık'],   ['slug' => 'psikoloji-ve-saglik']);
        $catEgitim  = Category::firstOrCreate(['name' => 'Eğitim'],                ['slug' => 'egitim']);
        $catTekno   = Category::firstOrCreate(['name' => 'Teknoloji ve Toplum'],   ['slug' => 'teknoloji-ve-toplum']);
        $catManevi  = Category::firstOrCreate(['name' => 'Manevi Yazılar'],         ['slug' => 'manevi-yazilar']);

        // Tüm yazılar ugurkantekin.com.tr sitesinden alınmıştır. 
        // Not: Görseller artık public/images/posts/ klasöründe yer almaktadır.
        $posts = [
            [
                'title'   => 'VARDİYA NE DEMEK? HAYATI MOLALARA BÖLMEK Mİ DEMEK?',
                'excerpt' => 'Vardiya sistemi, milyonlarca insanın hayatını molalara bölen bir düzendir. Peki bu düzen insanı nasıl etkiliyor?',
                'content' => '<p>Vardiya sistemi, milyonlarca insanın hayatını molalara bölen bir düzendir. Peki bu düzen insanı nasıl etkiliyor? Kısık sesle yaşamak zorunda kalan insanların iç dünyasına bir bakış.</p><p>Geceyi gündüze, gündüzü geceye katan bir yaşam biçimi bu. Sosyal hayattan kopuş, aileyle geçirilen vaktin azalması ve biyolojik saatin bozulması... Vardiya, sadece iş değil, bir fedakarlıktır.</p>',
                'image'   => 'images/posts/asagilik.jpg',
                'cat'     => $catGelisim->id,
            ],
            [
                'title'   => 'AŞAĞILIK KOMPLEKSİ ŞİDDETE NEDEN OLUR MU?',
                'excerpt' => 'Aşağılık kompleksi, bireyin kendini başkalarından yetersiz hissetmesiyle ortaya çıkar. Bu duygu saldırganlığa dönüşebilir mi?',
                'content' => '<p>Aşağılık kompleksi, bireyin kendini başkalarından yetersiz hissetmesiyle ortaya çıkar. Bu duygu bazen kontrolden çıkıp saldırganlığa, hatta şiddete dönüşebilir.</p><p>Alfred Adler\'in üzerinde yıllarca çalıştığı bu kavram, günümüzde toplumsal şiddetin önemli kaynaklarından biri olarak kabul görmektedir. Kendini yetersiz hisseden birey, bu açığı başkaları üzerinde baskı kurarak kapatmaya çalışır.</p>',
                'image'   => 'images/posts/asagilik.jpg',
                'cat'     => $catPsiko->id,
            ],
            [
                'title'   => 'BABA YARASIMI? KALP AÇLIĞI MI?',
                'excerpt' => 'Baba figürü bir çocuğun hayatında en güvenli limandır. Bu limanın eksikliği derin yaralar açabilir.',
                'content' => '<p>Baba figürü bir çocuğun hayatında en güvenli limandır. Bu limanın eksikliği derin yaralar açabilir. Kalp açlığı mı daha ağır, yoksa karnın açlığı mı?</p><p>Psikologlar, baba yokluğunun çocuklarda bıraktığı izleri yıllarca taşıdıklarını söylüyor. Bir çocuğun en büyük ihtiyacı, güvenli bir sığınaktır ve o sığınak babanın şefkatidir.</p>',
                'image'   => 'images/posts/baba.jpg',
                'cat'     => $catAile->id,
            ],
            [
                'title'   => 'PROBLEM GENÇLERDE Mİ? AİLELERDE Mİ?',
                'excerpt' => 'Gençlik dönemi fırtınalı bir dönemdir. Ancak bu fırtınanın kaynağı sadece gençler mi, yoksa aile içi iletişim mi?',
                'content' => '<p>Gençlik dönemi fırtınalı bir dönemdir. Ancak bu fırtınanın kaynağı sadece gençler mi, yoksa aile içi iletişim mi? Aile içi şiddetin çocuklar üzerindeki etkileri ele alınıyor.</p><p>Toplumsal araştırmalar, sorunlu gençlerin büyük çoğunluğunun aile içi problemlerden kaynaklandığını ortaya koyuyor. Gençlik, bir sonuçtur; başlangıç ise ailedir.</p>',
                'image'   => 'images/posts/aile.jpg',
                'cat'     => $catAile->id,
            ],
            [
                'title'   => 'HANGİ EĞİTİM SİSTEMİ? HAYATA BAĞLAYAN MI?',
                'excerpt' => 'Eğitim, inşa ettiği kadar imha edebilecek bir güce sahiptir. İyi öğretmenlik arayışında yeni bir ufuk açmalıyız.',
                'content' => '<p>Eğitim, inşa ettiği kadar imha edebilecek, geliştirdiği kadar da geriletebilecek bir güce sahiptir. Bu yüzden "İyi öğretmenlik arayışımızda yeni bir ufuk açmamız gerekiyor.</p><p>Entelektüel, duygusal ve manevi öğretmenlik bir arada olmalıdır. Öğretmeyi sadece bilgi aktarmaya indirgerseniz soğuk bir sürece dönüşür.</p>',
                'image'   => 'images/posts/egitim.jpg',
                'cat'     => $catEgitim->id,
            ],
            [
                'title'   => 'HATALARDAN DERS ALMALI MI?',
                'excerpt' => 'Süt bozulursa yoğurt olur. Yoğurt sütten daha değerlidir. Hatalar yaptığın için kötü değilsin, deneyimlisin.',
                'content' => '<p>Süt bozulursa yoğurt olur. Yoğurt sütten daha değerlidir. Daha da kötüleşirse peynir oluyor. Hatalar yaptığın için kötü değilsin. Hatalar, seni bir insan olarak daha değerli kılan deneyimlerdir.</p><p>Önemli olan hatadan kaçmak değil, hatadan ne öğrendiğindir. İnsan, düşe kalka yürümeyi öğrenir.</p>',
                'image'   => 'images/posts/hata.jpg',
                'cat'     => $catGelisim->id,
            ],
            [
                'title'   => 'DEPRESYONLUMUYUZ? BELİRTİLER NELER?',
                'excerpt' => 'Herkes zaman zaman kendini değersiz hissedebilir. Bu depresyon mu yoksa geçici bir hüzün mü?',
                'content' => '<p>Herkes zaman zaman kendini değersiz ve yetersiz görebilir. Bu bir suç veya zayıflık değildir. Ama bu depresyona dönüşmüşse profesyonel yardım gerekebilir.</p><p>Depresyon, ruhun bir çığlığıdır. Bedeni ve organları da etkileyen bir süreçtir. Kendinize zaman tanıyın ve bu süreci yönetmeyi öğrenin.</p>',
                'image'   => 'images/posts/asagilik.jpg',
                'cat'     => $catPsiko->id,
            ],
        ];

        // Mevcut seeded post'ları temizle
        Post::query()->delete();

        foreach ($posts as $postData) {
            $this->createPost($postData);
        }

        // Kategori bazlı post sayılarını kontrol et ve ekle (Eksik kalanlar için picsum kullanıyoruz)
        $categoryKeywords = [
            'Genel Yazılar'        => 'nature',
            'Kişisel Gelişim'      => 'growth',
            'Çocuk Yetiştirme'     => 'child',
            'Aile ve İlişkiler'    => 'family',
            'Psikoloji ve Sağlık'  => 'health',
            'Eğitim'               => 'school',
            'Teknoloji ve Toplum'   => 'tech',
            'Manevi Yazılar'       => 'spiritual',
        ];

        foreach (Category::all() as $category) {
            $currentCount = Post::where('category_id', $category->id)->count();
            if ($currentCount < 5) {
                $needed = 5 - $currentCount;
                $keyword = $categoryKeywords[$category->name] ?? 'nature';
                
                for ($i = 0; $i < $needed; $i++) {
                    $title = $category->name . ' - ' . ($i + 1) . '. Makale';
                    $this->createPost([
                        'title'        => $title,
                        'excerpt'      => $category->name . ' üzerine kaleme alınmış derinlemesine bir bakış açısı.',
                        'content'      => '<p>' . $category->name . ' dünyasına dair önemli bir çalışma olan bu makalede, hayata dair derinlemesine analizler bulacaksınız.</p><p>Toplum ve birey arasındaki dengeyi bulmak için yapılan bu araştırmalar size yeni ufuklar açacak.</p>',
                        'image'        => 'images/posts/egitim.jpg', // Varsayılan yerel görsel
                        'cat'          => $category->id,
                    ]);
                }
            }
        }
    }

    private function createPost(array $postData): void
    {
        $slug = Str::slug($postData['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        Post::create([
            'title'        => $postData['title'],
            'slug'         => $slug,
            'content'      => $postData['content'],
            'excerpt'      => $postData['excerpt'] ?? Str::limit(strip_tags($postData['content']), 150),
            'category_id'  => $postData['cat'],
            'image'        => $postData['image'],
            'is_published' => true,
        ]);
    }
}
