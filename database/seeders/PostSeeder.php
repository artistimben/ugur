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
        // Kategorileri Al
        $catGenel   = Category::where('name', 'Genel Yazılar')->first();
        $catGelisim = Category::where('name', 'Kişisel Gelişim')->first();
        $catCocuk   = Category::where('name', 'Çocuk Yetiştirme')->first();
        $catAile    = Category::where('name', 'Aile ve İlişkiler')->first();
        $catPsiko   = Category::where('name', 'Psikoloji ve Sağlık')->first();
        $catManevi  = Category::where('name', 'Manevi Yazılar')->first();

        $postsData = [
            [
                'title'   => 'AŞAĞILIK KOMPLEKSİ İNSAN DÖVMEYE VE ÖLDÜRMEYE NEDEN OLUR MU?',
                'excerpt' => 'Aşağılık kompleksi, bireyin kendini başkalarından yetersiz hissetmesi durumudur. Bu his bazen saldırganlığa yol açabilir...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2026/02/imagesasagilik.jpg',
                'category_id' => $catPsiko->id ?? null
            ],
            [
                'title'   => 'BABA YARASIMI? KALP AÇLIĞI MI, KARIN AÇLIĞI MI?',
                'excerpt' => 'Baba figürü bir çocuğun hayatında en güvenli limandır. Bu limanın eksikliğı derin yaralar açabilir...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/12/BABA.jpg',
                'category_id' => $catAile->id ?? null
            ],
            [
                'title'   => 'PROBLEM GENÇLERDE Mİ? AİLELERDE Mİ?',
                'excerpt' => 'Gençlik dönemi fırtınalı bir dönemdir. Ancak bu fırtınanın kaynağı sadece gençler mi, yoksa aile içi iletişim mi?',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/11/Aile-Ici-Siddetin-Cocuk-Uzerindeki-Etkileri-Nasil-Azaltilabilir.jpg',
                'category_id' => $catAile->id ?? null
            ],
            [
                'title'   => 'DEPRESYONDA MIYIZ?',
                'excerpt' => 'Herkes zaman zaman kendini değersiz ve yetersiz görebilir veya kötü hissedebilir. Bu bir suç ve zayıflık değildir...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/depresyon-2-1020x600.jpg',
                'category_id' => $catPsiko->id ?? null
            ],
            [
                'title'   => 'DEPRESYON İLAÇLARI KULLANILMALI MI?',
                'excerpt' => 'Günümüzde herkes rahat olmadığından şikâyetçi olur ama hiç kimsede rahatlıkla ilgili yapılması gerekenleri araştırmaz...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/depresyon-1020x600.jpg',
                'category_id' => $catPsiko->id ?? null
            ],
            [
                'title'   => 'DEĞER VERME VE DEĞERSİZLİK HİSSİ',
                'excerpt' => 'Eğitimci yazar Alişan Kapaklıkaya kitabında anlatıyor: 2010 yılında Şanlıurfa’ya konferans için gittim...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/degersizlik.jpg',
                'category_id' => $catGelisim->id ?? null
            ],
            [
                'title'   => 'ÇÖP KAMYONU TEORİSİ',
                'excerpt' => 'Kadın taksiye binmiş ve hava alanına gitmek istediğini söylemişti. Sağ şeritte yol alırken siyah bir araba...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cop-700x600.jpeg',
                'category_id' => $catGelisim->id ?? null
            ],
            [
                'title'   => 'ÇOCUKLARIMIZA ÖZEN GÖSTERELİM',
                'excerpt' => 'Okulların açılması ile birlikte ilk haftalarda tanışma faslı ile başlayan konuşmalarda birçok öğrencinin...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cocuga-ozen.jpg',
                'category_id' => $catCocuk->id ?? null
            ],
            [
                'title'   => 'ÇOCUK YETİŞTİRMEDE DENGE',
                'excerpt' => 'Genellikle her insan, ebeveyn olduğunda çocukları üzerinden yeni bir hikâye yazmaya başlıyor...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cocuk-yetistirme-e1554230003496.jpg',
                'category_id' => $catCocuk->id ?? null
            ],
            [
                'title'   => 'ÇOCUĞA PARA KAVRAMI NE ZAMAN ÖĞRETİLMELİ?',
                'excerpt' => 'Maaşlar mı yetmiyor? Tüketim kültürü nümül bilmiyoruz. Marketlerde, oyuncakçılarda AVM’lerde...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/para-cocuk-1-.jpg',
                'category_id' => $catCocuk->id ?? null
            ],
            [
                'title'   => 'ÇİTLERİN İÇİNDEKİ DAR VE GENİŞ DÜNYALAR',
                'excerpt' => 'Uçsuz bucaksız bir çimenlik alan düşünün. Bu çimenliğin üstünde bir aile, bir çit çekiyor ve...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/citler.jpeg',
                'category_id' => $catAile->id ?? null
            ],
            [
                'title'   => 'ÇEKTİKLERİMİZ HEP KENDİ ELİMİZDEN Mİ?',
                'excerpt' => 'Ellerimizle ürettiklerimizin sonuçlarını yaşarız daima. Buradaki “eller” tabirini sadece fiillerimizin...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/SARMISAK.jpg',
                'category_id' => $catGelisim->id ?? null
            ],
            [
                'title'   => 'CESARET',
                'excerpt' => 'İşe yeni başlayan birçok kişi o günün bitiminde sevinerek evlerine dönerler ve soranlara...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cesaret.jpg',
                'category_id' => $catGelisim->id ?? null
            ],
            [
                'title'   => 'CENNET KOKULU ELMALAR',
                'excerpt' => 'Yaşlı bir çift çocuklarını evlendirmişler ve bir köyde Allah için birbirlerine saygı ve sevgi içinde...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cennet-kokulu-elma.jpg',
                'category_id' => $catManevi->id ?? null
            ],
            [
                'title'   => 'CANIMIZ, DUA SEBİLİMİZ, ANALARIMIZ',
                'excerpt' => 'Derste bir öğrencim “Hocam dergiye bu ay yazı yazdınız mı” dedi. “Şu an hazırlıyorum...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/dua-sebili-anneler.jpg',
                'category_id' => $catManevi->id ?? null
            ],
            [
                'title'   => 'BOŞANMALARI ÖNLEYELİM',
                'excerpt' => 'Türkiye İstatistik Kurumu tarafından 2007 yılından itibaren yıllık yayımlanan evlenme ve boşanma...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/kirik-kalp-1020x600.jpg',
                'category_id' => $catAile->id ?? null
            ],
            [
                'title'   => 'İKİ KALBE MUKABİL BİR KALP',
                'excerpt' => 'Her insan hayatının karşılığını, kalbinin eşini, ruh ikizini arar durur. Bulabilen insan hayattan...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/iki-kalbe-bir-kalp.jpg',
                'category_id' => $catAile->id ?? null
            ],
            [
                'title'   => 'BİLİNÇALTINI YÖNETMEK',
                'excerpt' => 'Beyin, çok yönlü bir kontrol merkezidir. Beyin, bütün vücut sistemlerini yönetir ve aralarında işbirliği sağlar...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/01/akil.jpg',
                'category_id' => $catPsiko->id ?? null
            ],
            [
                'title'   => 'BİLİNÇALTI',
                'excerpt' => 'Bilinçaltı çoğumuzun bildiği ya da duyduğu bir kavramdır. Bu kavram bilincimizin farkında olmadığı...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/bilincalti-900x600.jpg',
                'category_id' => $catPsiko->id ?? null
            ],
            [
                'title'   => 'BİLGİ VE SEVGİNİN BİRLEŞİMİ; İNSAN KAYNAKLARI',
                'excerpt' => 'Yönetimde disiplinsizliğin nedeni büyük ölçüde yöneticidir, daha doğrusu yöneticinin yönetim sistemidir...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/insan-kaynaklari.jpg',
                'category_id' => $catGenel->id ?? null
            ],
            [
                'title'   => 'SEVGİ – BİLDİĞİMİZ GİBİ Mİ?',
                'excerpt' => 'Japonya\'da yaşanmış gerçek bir olay şöyledir: Evini yeniden dekore ettirmek isteyen Japon...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/sevgi-bildigimiz-1020x600.jpg',
                'category_id' => $catGelisim->id ?? null
            ],
        ];

        // Mevcutları temizle (isteğe bağlı, seeder yapısına göre)
        Post::query()->delete();

        foreach ($postsData as $data) {
            Post::create([
                'title'        => $data['title'],
                'slug'         => Str::slug($data['title']),
                'content'      => $data['excerpt'] . "\n\n(Bu içerik geçici olarak eklenmiştir. Gerçek yazı içeriği yakında eklenecektir.)",
                'excerpt'      => $data['excerpt'],
                'category_id'  => $data['category_id'] ?? $catGenel->id,
                'image'        => $data['image'],
                'is_published' => true,
            ]);
        }
    }
}
