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
        // Ensure categories exist
        $catDini = Category::firstOrCreate(['name' => 'Dini Bilgiler'], ['slug' => 'dini-bilgiler']);
        $catCocuk = Category::firstOrCreate(['name' => 'Çocuk Yetiştirme'], ['slug' => 'cocuk-yetistirme']);
        $catAile = Category::firstOrCreate(['name' => 'Aile İletişimi'], ['slug' => 'aile-iletisimi']);
        $catGelisim = Category::firstOrCreate(['name' => 'Kişisel Gelişim'], ['slug' => 'kisisel-gelisim']);
        $catManevi = Category::firstOrCreate(['name' => 'Manevi Yazılar'], ['slug' => 'manevi-yazilar']);
        $catGenel = Category::firstOrCreate(['name' => 'Genel'], ['slug' => 'genel']);

        $posts = [
            [
                'title' => 'AŞAĞILIK KOMPLEKSİ İNSAN DÖVMEYE VE ÖLDÜRMEYE NEDEN OLUR MU?',
                'excerpt' => 'Aşağılık kompleksi, bireyin kendini başkalarından yetersiz hissetmesi durumudur. Bu his bazen saldırganlığa yol açabilir...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2026/02/imagesasagilik.jpg',
                'cat' => $catGelisim->id
            ],
            [
                'title' => 'BABA YARASIMI? KALP AÇLIĞI MI, KARIN AÇLIĞI MI?',
                'excerpt' => 'Baba figürü bir çocuğun hayatında en güvenli limandır. Bu limanın eksikliği derin yaralar açabilir...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/12/BABA.jpg',
                'cat' => $catAile->id
            ],
            [
                'title' => 'PROBLEM GENÇLERDE Mİ? AİLELERDE Mİ?',
                'excerpt' => 'Gençlik dönemi fırtınalı bir dönemdir. Ancak bu fırtınanın kaynağı sadece gençler mi, yoksa aile içi iletişim mi?',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/11/Aile-Ici-Siddetin-Cocuk-Uzerindeki-Etkileri-Nasil-Azaltilabilir.jpg',
                'cat' => $catAile->id
            ],
            [
                'title' => 'DEPRESYONLUMUYUZ?',
                'excerpt' => 'Herkes zaman zaman kendini değersiz ve yetersiz görebilir veya kötü hissedebilir. Bu bir suç ve zayıflık değildir...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/depresyon-2-1020x600.jpg',
                'cat' => $catGelisim->id
            ],
            [
                'title' => 'ÇOCUKLARIMIZA ÖZEN GÖSTERELİM',
                'excerpt' => 'Okulların açılması ile birlikte ilk haftalarda tanışma faslı ile başlayan konuşmalarda birçok öğrencinin...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cocuga-ozen.jpg',
                'cat' => $catCocuk->id
            ],
            [
                'title' => 'ÇOCUK YETİŞTİRMEDE DENGE',
                'excerpt' => 'Genellikle her insan, ebeveyn olduğunda çocukları üzerinden yeni bir hikâye yazmaya başlıyor...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cocuk-yetistirme-e1554230003496.jpg',
                'cat' => $catCocuk->id
            ],
            [
                'title' => 'CENNET KOKULU ELMALAR',
                'excerpt' => 'Yaşlı bir çift çocuklarını evlendirmişler ve bir köyde Allah için birbirlerine saygı ve sevgi içinde...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cennet-kokulu-elma.jpg',
                'cat' => $catManevi->id
            ],
            [
                'title' => 'BOŞANMALARI ÖNLEYELİM……',
                'excerpt' => 'Türkiye İstatistik Kurumu tarafından 2007 yılından itibaren yıllık yayımlanan evlenme ve boşanma...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/kirik-kalp-1020x600.jpg',
                'cat' => $catAile->id
            ],
            [
                'title' => 'BİLİNÇALTINI YÖNETMEK',
                'excerpt' => 'Beyin, çok yönlü bir kontrol merkezidir. Beyin, bütün vücut sistemlerini yönetir ve aralarında işbirliği sağlar...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/01/akil.jpg',
                'cat' => $catGelisim->id
            ],
            [
                'title' => 'DİNİ BİLGİLER VE HAYAT',
                'excerpt' => 'İnanç dünyamızın gündelik hayatımıza yansımaları üzerine önemli notlar...',
                'image' => 'https://images.unsplash.com/photo-1542810634-71277d95dcbb?auto=format&fit=crop&q=80&w=1000',
                'cat' => $catDini->id
            ]
        ];

        // Clear only seeded posts to avoid collisions if we were to rerun, but better to use truncate
        Post::query()->delete();

        foreach ($posts as $postData) {
            Post::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'content' => $postData['excerpt'] . "\n\nBu yazı örnek olarak eklenmiştir. Tam içeriği admin panelinden güncelleyebilirsiniz.",
                'excerpt' => $postData['excerpt'],
                'category_id' => $postData['cat'],
                'image' => $postData['image'],
                'is_published' => true
            ]);
        }
    }
}
