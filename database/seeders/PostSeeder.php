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

        // Tüm yazılar ugurkantekin.com.tr sitesinden alınmıştır
        $posts = [
            // ─── EN YENİ YAZILAR (Slider'da görünenler) ────────────────────────────
            [
                'title'   => 'VARDİYA NE DEMEK? HAYATI MOLALARA BÖLMEK Mİ DEMEK? KISIK SES, KISIK HAYAT MI DEMEK?',
                'excerpt' => 'Vardiya sistemi, milyonlarca insanın hayatını molalara bölen bir düzendir. Peki bu düzen insanı nasıl etkiliyor?',
                'content' => 'Vardiya sistemi, milyonlarca insanın hayatını molalara bölen bir düzendir. Peki bu düzen insanı nasıl etkiliyor? Kısık sesle yaşamak zorunda kalan insanların iç dünyasına bir bakış...',
                'image'   => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80',
                'cat'     => $catGelisim->id,
                'published_at' => '2026-03-24',
            ],
            [
                'title'   => 'AŞAĞILIK KOMPLEKSİ İNSAN DÖVMEYE VE ÖLDÜRMEYE NEDEN OLUR MU?',
                'excerpt' => 'Aşağılık kompleksi, bireyin kendini başkalarından yetersiz hissetmesiyle ortaya çıkar. Bu duygu bazen kontrolden çıkıp saldırganlığa, hatta şiddete dönüşebilir.',
                'content' => 'Aşağılık kompleksi, bireyin kendini başkalarından yetersiz hissetmesiyle ortaya çıkar. Bu duygu bazen kontrolden çıkıp saldırganlığa, hatta şiddete dönüşebilir. Alfred Adler\'in üzerinde yıllarca çalıştığı bu kavram, günümüzde toplumsal şiddetin önemli kaynaklarından biri olarak kabul görmektedir.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2026/02/imagesasagilik.jpg',
                'cat'     => $catPsiko->id,
                'published_at' => '2026-02-02',
            ],
            [
                'title'   => 'BABA YARASIMI? KALP AÇLIĞI MI, KARIN AÇLIĞI MI?',
                'excerpt' => 'Baba figürü bir çocuğun hayatında en güvenli limandır. Bu limanın eksikliği derin yaralar açabilir. Kalp açlığı mı daha ağır, yoksa karnın açlığı mı?',
                'content' => 'Baba figürü bir çocuğun hayatında en güvenli limandır. Bu limanın eksikliği derin yaralar açabilir. Kalp açlığı mı daha ağır, yoksa karnın açlığı mı? Psikologlar, baba yokluğunun çocuklarda bıraktığı izleri yıllarca taşıdıklarını söylüyor.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/12/BABA.jpg',
                'cat'     => $catAile->id,
                'published_at' => '2025-12-23',
            ],

            // ─── ANA FEED YAZILARI ────────────────────────────────────────────────
            [
                'title'   => 'PROBLEM GENÇLERDE Mİ? AİLELERDE Mİ?',
                'excerpt' => 'Gençlik dönemi fırtınalı bir dönemdir. Ancak bu fırtınanın kaynağı sadece gençler mi, yoksa aile içi iletişim mi? Aile içi şiddetin çocuklar üzerindeki etkileri ele alınıyor.',
                'content' => 'Gençlik dönemi fırtınalı bir dönemdir. Ancak bu fırtınanın kaynağı sadece gençler mi, yoksa aile içi iletişim mi? Aile içi şiddetin çocuklar üzerindeki etkileri ele alınıyor. Toplumsal araştırmalar, sorunlu gençlerin büyük çoğunluğunun aile içi problemlerden kaynaklandığını ortaya koyuyor.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/11/Aile-Ici-Siddetin-Cocuk-Uzerindeki-Etkileri-Nasil-Azaltilabilir.jpg',
                'cat'     => $catAile->id,
                'published_at' => '2025-11-26',
            ],
            [
                'title'   => 'HANGİ EĞİTİM SİSTEMİ? SOKAĞA İTEN Mİ? HAYATA BAĞLAYAN MI?',
                'excerpt' => 'Eğitim, inşa ettiği kadar imha edebilecek, geliştirdiği kadar da geriletebilecek bir güce sahiptir. İyi öğretmenlik arayışında yeni bir ufuk açmamız gerekiyor.',
                'content' => 'Eğitim, inşa ettiği kadar imha edebilecek, geliştirdiği kadar da geriletebilecek bir güce sahiptir. Bu yüzden "İyi öğretmenlik arayışımızda yeni bir ufuk açmamız gerekiyor: Bu manzarayı tam olarak çizmek için üç önemli yol izlenmeli: entelektüel, duygusal ve manevi öğretmenlik. Bunların hiçbiri göz ardı edilemez. Öğretmeyi zekaya indirgerseniz soğuk bir soyutlamaya dönüşür; duygulara indirgerseniz narsistik hale gelir."',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/10/indir.jpeg',
                'cat'     => $catEgitim->id,
                'published_at' => '2025-10-28',
            ],
            [
                'title'   => 'HATALARDAN DERS ALINMALI MI? KORKULUP KAÇILMALI MI?',
                'excerpt' => 'Süt bozulursa yoğurt olur. Yoğurt sütten daha değerlidir. Daha da kötüleşirse peynir oluyor. Peynir yoğurttan da sütten de değerlidir. Hatalar yaptığın için kötü değilsin.',
                'content' => 'Süt bozulursa yoğurt olur. Yoğurt sütten daha değerlidir. Daha da kötüleşirse peynir oluyor. Peynir yoğurttan da sütten de değerlidir. Ve üzüm suyu sirkeye dönüşürse üzüm suyundan daha uzun ömürlü ve faydalı olur. Hatalar yaptığın için kötü değilsin. Hatalar, seni bir insan olarak daha değerli kılan deneyimlerdir. Kristof Kolomb, Amerika\'yı keşfetmesine neden olan bir navigasyon hatası yaptı.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/09/HATA-DERS.png',
                'cat'     => $catGelisim->id,
                'published_at' => '2025-09-29',
            ],
            [
                'title'   => 'SOSYAL MEDYA İLE İNANILMAZ SALDIRI ALTINDAYIZ',
                'excerpt' => 'Bir gazete "İnanılmaz saldırı altındayız" diye başlık atmış. Son zamanlarda insanın anlam arayışı ve mevcut sosyal medya düzeninden kaçışın yollarına dair denemeler çok fazla görülmeye başlandı.',
                'content' => 'Bir gazete Ersin Çelik yazısında "İnanılmaz saldırı altındayız" diye başlık atmış. Son zamanlarda insanın anlam arayışı ve mevcut sosyal medya düzeninden kaçışın yollarına dair denemeler çok fazla görülmeye başlandı. İnternetin icadından sonra bugüne dek görülmüş en yaygın akım haline dönüşen sosyal medya, iletişimimizi kolaylaştırdığı kadar belli riskleri de beraberinde getiriyor.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/08/sosyal-medya.jpg',
                'cat'     => $catTekno->id,
                'published_at' => '2025-08-24',
            ],
            [
                'title'   => 'EĞİTİM SİSTEMİ YENİDEN GÖZDEN GEÇİRİLMELİ Mİ?',
                'excerpt' => 'Bir insanın eğitilmesinin öğretimle olduğu söyleniyor. Yanlış değilse de eksik! Eğitim olmadan öğretim; maddeci, ruhsuz ve egoist insan tipini yetiştirir.',
                'content' => 'Bir insanın eğitilmesinin öğretimle olduğu söyleniyor. Yanlış değilse de eksik! Eğitim olmadan öğretim; maddeci, ruhsuz ve egoist insan tipini yetiştirir. İnsan, anne karnında bazı bilgiler alır ve doğar. Komşu ve arkadaşlarından ibaret dünyası; seküler-yapay-maddiyatçı bir sisteme hapsedilmiş anaokulu, ilkokul, ortaokul, lise ve üniversite eğitimine maruz kalarak, karanlık bir şekilde zenginleşir.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/07/egirtim-gozden-gecirme.jpg',
                'cat'     => $catEgitim->id,
                'published_at' => '2025-07-30',
            ],
            [
                'title'   => 'FARKLI KUŞAKLARIN BİRBİRLERİNİ TANIMALARI, ANLAMALARI SON DERECE ÖNEMLİ',
                'excerpt' => 'Tarihin her döneminde gençler ve yetişkinler arasında iletişim sorunları ve kuşak çatışmaları yaşanmıştır. Bu durum gençlerin ve yetişkinlerin kişisel hayatlarını olduğu kadar toplumsal işleyişi de etkiliyor.',
                'content' => 'Tarihin her döneminde gençler ve yetişkinler arasında iletişim sorunları ve kuşak çatışmaları yaşanmıştır. "Elbette bu durum genç ve yetişkin bireylerin kişisel hayatlarını olduğu kadar onları çevreleyen toplumsal işleyişi de etkilemektedir. Kuşaklar arasında ciddi uyumsuzluklar ve çatışmalar daha sıklıkla yaşanmakta, gençler ile yetişkinler arasında ideal bir iletişim dili oluşturamamanın sıkıntısı yaşanmaktadır.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/06/FARKLI-KUSAKLAR-768x445.jpg',
                'cat'     => $catAile->id,
                'published_at' => '2025-06-30',
            ],
            [
                'title'   => 'BEYİN SİSİ NEDİR? BEYİN SİSİ BELİRTİLERİ NELERDİR?',
                'excerpt' => 'Son zamanlarda çok farklı hastalıklar görülmeye başladı. Bunlardan birisi de beyin sisi hastalığı olarak ortaya çıktı. Beyin sisi, zihinsel bulanıklık, hafıza sorunları ve odaklanma eksikliği gibi belirtilerle kendini gösteren bir tür bilişsel işlev bozukluğudur.',
                'content' => 'Son zamanlarda çok farklı hastalıklar görülmeye başladı. Bunlardan birisi de beyin sisi hastalığı olarak ortaya çıktı. Beyin sisi, zihinsel bulanıklık, hafıza sorunları ve odaklanma eksikliği gibi belirtilerle kendini gösteren bir tür bilişsel işlev bozukluğudur. Tıbbi bir tanısı bulunmayan beyin sisi yoğun stres, uyku bozukluğu ve bilgisayar ekranına uzun süre bakmak gibi nedenlerle ortaya çıkabilir.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/05/beyin-sisi-nedir-ve-neden-olur-768x480.jpg',
                'cat'     => $catPsiko->id,
                'published_at' => '2025-05-31',
            ],
            [
                'title'   => '"KİŞİNİN ÖZERK DÜŞÜNEBİLMESİ VE DAVRANABİLMESİ" NE DEMEKTİR?',
                'excerpt' => 'Bir tasavvuf ehli hakiki manada Müslüman olmanın 3 şartı var: Hür Akıl, Hür Kalp ve Hür İrade. Ama çocuklarımızı bize bağlı, sorgulayamayan bir nesil olarak yetiştiriyoruz.',
                'content' => 'Bir tasavvuf ehli hakiki manada Müslüman olmanın 3 şartı var. Bunlar: Hür Akıl, Hür Kalp ve Hür İrade demişti. Ama gerek İslami kesimde gerek diğer kesimlerde çocuklarımızı bize bağlı, siyaset ve lidere şeksiz biat eden, yorum yapamayan ve sorgulayamayan bir nesil olarak yetiştiriyoruz. Kişinin kendiyle olan ilişkisi ilk ne zaman başlar?',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/04/images.jpeg',
                'cat'     => $catGelisim->id,
                'published_at' => '2025-04-26',
            ],
            [
                'title'   => 'BÜYÜMEKTE OLAN TOPLUMSAL BİR SORUN: SANAL KUMAR BAĞIMLILIĞI',
                'excerpt' => 'Pandemi sürecinde yaşanan kapanmalar ve oluşan belirsizlik ortamı bazı bağımlılık türlerinde artış yaşanmasına yol açtı. Araştırmalar çevrim içi kumar bağımlılığındaki artışı da gözler önüne seriyor.',
                'content' => 'Pandemi sürecinde yaşanan kapanmalar ve oluşan belirsizlik ortamı bazı bağımlılık türlerinde artış yaşanmasına yol açtı. Araştırmalar bu süreçte çevrim içi kumar bağımlılığındaki artışı da gözler önüne seriyor. Virüs sadece sosyal yaşamımızı değil; iş hayatımızı ve finansal yaşamımızı da etkiledi. Yaşanan sosyal ve ekonomik sıkıntılar ruh sağlığımızda da problemler ortaya çıkarmaya başladı.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/03/DALL·E-2024-11-21-12.10.44-A-thought-provoking-illustration-showing-a-teenager-caught-in-the-grip-of-gambling-addiction.-The-scene-features-a-dark-room-illuminated-by-the-glow-o-kopyasi-768x480.jpg',
                'cat'     => $catTekno->id,
                'published_at' => '2025-03-26',
            ],
            [
                'title'   => 'ÖFKELİ HAYAT, KALP KRİZİ VE ŞUURLU HAREKET…',
                'excerpt' => 'Son yıllarda duyguların klinik önemi konusunda yoğun çalışmalar yapılmaktadır. Pek çok cerrah bilir ki, panik içinde ameliyata girmek istemeyen hastalarda komplikasyon daha çok olur.',
                'content' => 'Son yıllarda "Duyguların klinik önemi" konusunda yoğun çalışmalar yapılmaktadır. Bir çok cerrah bilir ki, panik içinde ameliyata girmek istemeyen hastalarda komplikasyon daha çok olur. Ameliyat sonrası enfeksiyonlar, kanamalar, yara iyileşmeleri kişilerin duygu durumları ile yakından ilgilidir. Hasta sakinken yapılan ameliyatın sonu daha iyi gider.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/02/olumlu-duygular-b-768x480.jpg',
                'cat'     => $catPsiko->id,
                'published_at' => '2025-02-26',
            ],
            [
                'title'   => 'AİLEYİ KORUMAK MI? BİTİRMEK Mİ?',
                'excerpt' => '"Günümüzde bir medeniyet krizi yaşanıyor. Aileler dağılıyor, çocuk ruh sağlığı sorunları artıyor, nikah karşıtı akımlar artıyor." Aileyi korumak günümüzün en önemli meselelerinden biri haline geldi.',
                'content' => '"Günümüzde bir medeniyet krizi yaşanıyor. Aileler dağılıyor, çocuk ruh sağlığı sorunları artıyor, nikah karşıtı akımlar artıyor." "Aileyi korumak günümüzün en önemli meselelerinden biri haline geldi. Bu konuda Prof. Dr. Nevzat Tarhan, ailelerin olmadığı yerlerde toplumun da oluşmadığını kaydetti. Tarhan; "Aile birey açısından da toplum açısından da temel bir kurumdur. Bir binayı ayakta tutan yapı taşlarıdır.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2024/12/ailenin-korunmasi.jpg',
                'cat'     => $catAile->id,
                'published_at' => '2024-12-26',
            ],

            // ─── ESKİ YAZILARIN DEVAMI (Sticky Posts) ─────────────────────────────
            [
                'title'   => 'DEPRESYONLUMUYUZ?',
                'excerpt' => 'Herkes zaman zaman kendini değersiz ve yetersiz görebilir veya kötü hissedebilir. Bu bir suç ve zayıflık değildir. Ama bu depresyona dönüşmüşse tedavi gerekebilir.',
                'content' => 'Herkes zaman zaman kendini değersiz ve yetersiz görebilir veya kötü hissedebilir. Bu bir suç ve zayıflık değildir. Ama bu depresyona dönüşmüşse tedavi gerekebilir. Depresyonda temel belirti "Elem-keder" hissi yönünde kendini gösteren bir artıştır. Örtülü depresyonda ise neşesizlik, durgunluk, elem, bir şeyden zevk almama duygusu fazla görülmez. Depresyon genellikle beden ve organ dili ile ortaya çıkar.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/depresyon-2-1020x600.jpg',
                'cat'     => $catPsiko->id,
                'published_at' => '2023-02-04',
            ],
            [
                'title'   => 'DEPRESYON İLAÇLARI KULLANILMALI MI?',
                'excerpt' => 'Günümüzde herkes rahat olmadığından şikâyetçi olur ama hiç kimsede rahatlıkla ilgili yapılması gerekenleri araştırmaz. Rahatlamayla ilgili çok şey duyarız, herkes ona gereksinim duyar.',
                'content' => 'Günümüzde herkes rahat olmadığından şikâyetçi olur ama hiç kimsede rahatlıkla ilgili yapılması gerekenleri araştırmaz. Rahatlamayla ilgili çok şey duyarız, herkes ona gereksinim duyar, hatta kendince bir şeyler yapmaya çalışır ama bunların birçoğu değil rahatlamak, aksine ters etki yapar. Eskiden annelerimiz öğleye kadar çamaşır, bulaşık, temizlik işyeriyle uğraşır, vakit bulursa biraz uyuyup hemen akşam yemek hazırlığına başlardı.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/depresyon-1020x600.jpg',
                'cat'     => $catPsiko->id,
                'published_at' => '2023-02-04',
            ],
            [
                'title'   => 'DEĞER VERME VE DEĞERSİZLİK HİSSİ',
                'excerpt' => 'Eğitimci yazar Alişan Kapaklıkaya kitabında anlatıyor: 2010 yılında Şanlıurfa\'ya konferans için gittim. Salonda 550 öğretmen vardı. Konu, "İLHAM VEREN ÖĞRETMEN".',
                'content' => 'Eğitimci yazar Alişan Kapaklıkaya kitabında anlatıyor: 2010 yılında Şanlıurfa\'ya konferans için gittim. Salonda 550 öğretmen vardı. Konu, "İLHAM VEREN ÖĞRETMEN". En ön sıradan bir parmak kalktı: "Siz benim de öğretmenimdiniz, ben de size geldim ve yemeğinizi yedim". Duygulandım. Sahneye çağırdım. Geldi: Bahsettiğiniz kartlardan bana da yazmıştınız, dedi. Elini ceketinin cebine sokup bir kart çıkardı.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/degersizlik.jpg',
                'cat'     => $catGelisim->id,
                'published_at' => '2023-02-04',
            ],
            [
                'title'   => 'ÇÖP KAMYONU TEORİSİ',
                'excerpt' => 'Kadın taksiye binmiş ve hava alanına gitmek istediğini söylemişti. Sağ şeritte yol alırken siyah bir araba park ettiği yerden aniden yola önlerine çıktı.',
                'content' => 'Kadın taksiye binmiş ve hava alanına gitmek istediğini söylemişti. Sağ şeritte yol alırken siyah bir araba park ettiği yerden aniden yola önlerine çıktı ve şoförü ise çarpmamak için sert şekilde frene bastı. Taksi kaydı, ama diğer arabaya çarpmaktan kıl payı farkla kurtuldu. Siyah arabanın sürücüsü camdan başını çıkarıp bağırmaya ve küfretmeye başladı. Taksi şoförü ise...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cop-700x600.jpeg',
                'cat'     => $catGelisim->id,
                'published_at' => '2023-02-04',
            ],
            [
                'title'   => 'ÇOCUKLARIMIZA ÖZEN GÖSTERELİM',
                'excerpt' => 'Okulların açılması ile birlikte ilk haftalarda tanışma faslı ile başlayan konuşmalarda birçok öğrencinin anne ya da babası ile aralarının soğuk olduğu gözlenmektedir.',
                'content' => 'Okulların açılması ile birlikte ilk haftalarda tanışma faslı ile başlayan konuşmalarda birçok öğrencinin anne ya da babası ile aralarının soğuk olduğu gözlenmektedir. Öğrencilere "Bir babanın ortalama bir günde çocuğu ile kaç dakika gerçek manada sohbet ettiğini sorduğumuzda" 2-4 saat diyorlar. Ancak bu sürenin 4 saniye olduğunu söylendiğinde arkasından birçok öğrencinin bir saniye bile konuşmadıkları görülmektedir.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cocuga-ozen.jpg',
                'cat'     => $catCocuk->id,
                'published_at' => '2023-02-04',
            ],
            [
                'title'   => 'ÇOCUK YETİŞTİRMEDE DENGE',
                'excerpt' => 'Genellikle her insan, ebeveyn olduğunda çocukları üzerinden yeni bir hikâye yazmaya başlıyor. Fakat kendi hikâyesiyle barışık değilse bu ikinci hayatın iplerini sıkı sıkı elinde tutuyor.',
                'content' => 'Genellikle her insan, ebeveyn olduğunda çocukları üzerinden yeni bir hikâye yazmaya başlıyor. Fakat kendi hikâyesiyle barışık değilse bu ikinci hayatın iplerini sıkı sıkı elinde tutuyor. Dolayısıyla hikâyenin asıl kahramanı olan çocuk perde arkasına itiliyor. Bu durumun çocuklarımızın gelişimi açısından olası zararları nelerdir? "Bir çocuk için en ağır yük ebeveynlerinin yaşayamadığı hayatlarıdır." der Carl Jung.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cocuk-yetistirme-e1554230003496.jpg',
                'cat'     => $catCocuk->id,
                'published_at' => '2023-02-04',
            ],
            [
                'title'   => 'ÇOCUĞA PARA KAVRAMI NE ZAMAN ÖĞRETİLMELİ?',
                'excerpt' => 'Maaşlar mı yetmiyor? Tüketim kültürü mü bilmiyoruz. Marketlerde, oyuncakçılarda AVM\'lerde kasa önlerine konulan çocuklara yönelik ürünler yüzünden ağlayan çocuklara mecburen aldıklarımızla bütçe açığı vermekteyiz.',
                'content' => 'Maaşlar mı yetmiyor? Tüketim kültürü mü bilmiyoruz. Marketlerde, oyuncakçılarda AVM\'lerde kasa önlerine konulan çocuklara yönelik ürünler yüzünden ağlayan çocuklara mecburen aldıklarımızla bütçe açığı vermekteyiz. Sadece bütçe açığımı vermekte miyiz yoksa mutsuz çocuklar da çoğalmakta mıdır? Modern dünyanın tüketim kültürünü desteklediğini, bunun da bireyleri yalnızlaştırıp mutsuzluğa sürüklediğini belirten psikiyatrist Prof. Dr. Nevzat Tarhan, tüketim bilincinin küçük yaşlarda verilmesi gerektiğini söylüyor.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/para-cocuk-1-.jpg',
                'cat'     => $catCocuk->id,
                'published_at' => '2023-02-04',
            ],
            [
                'title'   => 'ÇİTLERİN İÇİNDEKİ DAR VE GENİŞ DÜNYALAR…',
                'excerpt' => 'Uçsuz bucaksız bir çimenlik alan düşünün. Bu çimenliğin üstünde bir aile, bir çit çekiyor ve hep bu çitin içinde yaşıyor. Bu çitin içine kurallar koyuyor.',
                'content' => 'Uçsuz bucaksız bir çimenlik alan düşünün. Bu çimenliğin üstünde bir aile, bir çit çekiyor ve hep bu çitin içinde yaşıyor. Bu çitin içine kurallar koyuyor ve bu çitin içinde yaşadıklarından bir tarih, bir değerler silsilesi oluşturuyor. Aile sürekli olarak fertlerini çitin içindeki değerlerle yargılıyor, suçluyor ve mahkum ediyor. Daha da dehşet verici olanı, çitin içindekiler dışarının farkına bile varamıyor.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/citler.jpeg',
                'cat'     => $catAile->id,
                'published_at' => '2023-02-04',
            ],
            [
                'title'   => 'ÇEKTİKLERİMİZ HEP KENDİ ELİMİZDEN Mİ?',
                'excerpt' => 'Ellerimizle ürettiklerimizin sonuçlarını yaşarız daima. Buradaki "eller" tabirini sadece "fiillerimizin sonuçlarını almak" diye okumak da yetersizdir.',
                'content' => 'Ellerimizle ürettiklerimizin sonuçlarını yaşarız daima. Buradaki "eller" tabirini sadece "fiillerimizin sonuçlarını almak" diye okumak da yetersizdir. Düşünceler, fiillerin hammaddesi olduğuna göre kişinin düşünsel ve duygusal boyutta ürettiği ve sürekli beslediği hırslar, hasetler, tepkiler, öfkeler, tutkular, takıntılar, aşırılıklar gibi konular da eller kapsamı içindedir ve biz bunların da bedelini öderiz ve ödemeye de devam etmekteyiz.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/SARMISAK.jpg',
                'cat'     => $catGelisim->id,
                'published_at' => '2023-02-04',
            ],
            [
                'title'   => 'CESARET',
                'excerpt' => 'İşe yeni başlayan birçok kişi o günün bitiminde sevinerek evlerine dönerler ve soranlara "çok şükür gayet kolay bir iş" derler. Bu şekilde bir düşünce, insanı başarı yolundan alı koyar.',
                'content' => 'İşe yeni başlayan birçok kişi o günün bitiminde sevinerek evlerine dönerler ve soranlara "çok şükür gayet kolay bir iş" derler. Bu şekilde bir düşünce, insanı başarı yolundan alı koyar. Onun göz ardı ettiği şey işin kendi hayatındaki en iyi dostu olacağıdır. Dünyadaki en bahtsız kişi, yapılacak iş bulamayanlardır. Bu tür insanlar hayattan bıkarlar.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cesaret.jpg',
                'cat'     => $catGelisim->id,
                'published_at' => '2023-02-03',
            ],
            [
                'title'   => 'CENNET KOKULU ELMALAR',
                'excerpt' => 'Yaşlı bir çift çocuklarını evlendirmişler ve bir köyde Allah için birbirlerine saygı ve sevgi içinde yaşamaya devam ediyorlarmış.',
                'content' => 'Yaşlı bir çift çocuklarını evlendirmişler ve bir köyde Allah için birbirlerine saygı ve sevgi içinde yaşamaya devam ediyorlarmış. Bir gece yeni uykuya geçmişler. Kadın, elmalar ne kadar güzel, cennet kokulu elmalar diye sayıklıyorken, bir sesle uyanmışlar. Adam el feneri ile dışarı çıkınca ahırdan gelen sesler üzerine ahıra gittiğinde içerde birini görür. Adama selam verip misafiri ağırlamış.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cennet-kokulu-elma.jpg',
                'cat'     => $catManevi->id,
                'published_at' => '2023-02-03',
            ],
            [
                'title'   => 'CANIMIZ, DUA SEBİLİMİZ, ANALARIMIZ…',
                'excerpt' => 'Derste bir öğrencim "Hocam dergiye bu ay yazı yazdınız mı" dedi. "Şu an hazırlıyorum, konusu ise verimlilik" dedim. Öğrencim ise, "Bu ay anneler günü kutlanacak annelerle ilgili yazarsanız daha çok ilgi çeker" dedi.',
                'content' => 'Derste bir öğrencim "Hocam dergiye bu ay yazı yazdınız mı" dedi. "Şu an hazırlıyorum, konusu ise verimlilik" dedim. Öğrencim ise, "Bu ay anneler günü kutlanacak annelerle ilgili yazarsanız daha çok ilgi çeker" dedi. Bunun üzerine bu ay yazımızı anneler günü için birkaç satır yazmaya karar verdim. Şu an benim de annem yok. Rahmetli oldu...',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/dua-sebili-anneler.jpg',
                'cat'     => $catManevi->id,
                'published_at' => '2023-02-03',
            ],
            [
                'title'   => 'BOŞANMALARI ÖNLEYELİM……',
                'excerpt' => 'Türkiye İstatistik Kurumu tarafından 2007 yılından itibaren yıllık yayımlanan evlenme ve boşanma istatistikleri, aile yapısının zayıfladığını ortaya koydu.',
                'content' => 'Türkiye İstatistik Kurumu tarafından 2007 yılından itibaren yıllık yayımlanan evlenme ve boşanma istatistikleri, aile yapısının zayıfladığını ortaya koydu. Türkiye genelinde 2011 yılında 592 bin 775 çift evlenirken 120 bin 117 çift boşandı. 2011 yılında evlenen çiftlerin sayısı, bir önceki yıla göre yüzde 1,7 artarak 592 bin 775\'e yükselirken kaba evlenme hızı binde 8,02 oldu.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/kirik-kalp-1020x600.jpg',
                'cat'     => $catAile->id,
                'published_at' => '2023-02-03',
            ],
            [
                'title'   => 'İKİ KALBE MUKABİL BİR KALP',
                'excerpt' => 'Her insan hayatının karşılığını, kalbinin eşini, ruh ikizini arar durur. Bulabilen insan hayatın tüm yükünden kurtulur, gönlü ve ruhu huzura kavuşur.',
                'content' => 'Her insan hayatının karşılığını, kalbinin eşini, ruh ikizini arar durur. Bulabilen insan hayatın tüm yükünden kurtulur, gönlü ve ruhu huzura kavuşur. Bu bir gönül yolculuğudur. Kimi yolun başında, kimi yolun ortasında veya sonunda karşılığını bulmadan bu hayattan göçüp gider. Bu konuda bir âlim şöyle diyor: "İnsanın en fazla ihtiyacını tatmin eden, kalbine mukabil bir kalbin buluşmasıdır."',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/iki-kalbe-bir-kalp.jpg',
                'cat'     => $catManevi->id,
                'published_at' => '2023-02-03',
            ],
            [
                'title'   => 'BİLİNÇALTINI YÖNETMEK',
                'excerpt' => 'Beyin, çok yönlü bir kontrol merkezidir. Beyin, bütün vücut sistemlerini yönetir ve aralarında işbirliği sağlar. Tüm zihinsel faaliyetler, düşünceler, duygular, fiziksel duyular ve hareketler kendilerine özgü frekanslara sahiptir.',
                'content' => 'Beyin, çok yönlü bir kontrol merkezidir. Beyin, bütün vücut sistemlerini yönetir ve aralarında işbirliği sağlar. Tüm zihinsel faaliyetler, düşünceler, duygular, fiziksel duyular ve hareketler kendilerine özgü frekanslara sahiptir. Beş duyu organımızla algıladığımız her şey belirli bir beyin faaliyeti meydana getirir. Bütün hastalıklar, davranışlar, düşünceler, duygular ve algılamalar da kendine özgü dalga boyuna ve frekansa sahiptir.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/01/akil.jpg',
                'cat'     => $catPsiko->id,
                'published_at' => '2023-02-03',
            ],
            [
                'title'   => 'BİLİNÇALTI',
                'excerpt' => 'Bilinçaltı çoğumuzun bildiği ya da duyduğu bir kavramdır. Bu kavram bilincimizin farkında olmadığı ama davranışlarımızın yönlendirilmesinde önemli rol oynayan bir yapıyı belirtiyor.',
                'content' => 'Bilinçaltı çoğumuzun bildiği ya da duyduğu bir kavramdır. Bu kavram bilincimizin farkında olmadığı ama davranışlarımızın yönlendirilmesinde önemli rol oynayan bir yapıyı belirtiyor. Bilinçaltının en önemli özelliği ise bilincimizin farkına varmadığı olayları, sesleri, resimleri kaydetmesi. Siz beş katlı bir binaya çıkarken merdivenleri saymıyorsunuz ama bilinçaltınızda bu sayı biliniyor ve kaydediliyor.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/bilincalti-900x600.jpg',
                'cat'     => $catPsiko->id,
                'published_at' => '2023-02-03',
            ],
            [
                'title'   => 'BİLGİ VE SEVGİNİN BİRLEŞİMİ; İNSAN KAYNAKLARI',
                'excerpt' => 'Yönetimde disiplinsizliğin nedeni büyük ölçüde yöneticidir, daha doğrusu yöneticinin yönetim sistemidir. Disiplinsizliğin önlenmesi için personelin cezalandırılması değil, önce yönetimin düzeltilmesi gerekir.',
                'content' => 'Yönetimde disiplinsizliğin nedeni büyük ölçüde yöneticidir, daha doğrusu yöneticinin yönetim sistemidir. Disiplinsizliğin önlenmesi için personelin cezalandırılması değil, önce yönetimin düzeltilmesi gerekir. Yönetimde disiplinsizlik olunca, yöneticiler kontrolü artırır. Kontrol baskı demektir. Baskı tepki yaratır. Tepkide disiplinsizliği arttırır. Başarılı olmak için, astlardan şekilcilik değil verimlilik beklenmelidir.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/insan-kaynaklari.jpg',
                'cat'     => $catGelisim->id,
                'published_at' => '2023-02-03',
            ],
            [
                'title'   => 'SEVGİ… BİLDİĞİMİZ GİBİ Mİ?',
                'excerpt' => 'Japonya\'da yaşanmış gerçek bir olay şöyledir: Evini yeniden dekore ettirmek isteyen Japon bunun için bir duvarı yıktırır. Japon evlerinde genellikle iki tahta duvar arasında çukur bir boşluk bulunur.',
                'content' => 'Japonya\'da yaşanmış gerçek bir olay şöyledir: Evini yeniden dekore ettirmek isteyen Japon bunun için bir duvarı yıktırır. Japon evlerinde genellikle iki tahta duvar arasında çukur bir boşluk bulunur. Duvarı yıkarken, orada dışarıdan gelen bir çivinin ayağına battığı için sıkışmış bir kertenkele görür. Adam kertenkelenin ayağına çakılmış çiviyi görünce kendini kötü hisseder ve aynı zamanda meraklanır.',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/sevgi-bildigimiz-1020x600.jpg',
                'cat'     => $catManevi->id,
                'published_at' => '2023-02-02',
            ],
        ];

        // Mevcut seeded post'ları temizle
        Post::query()->delete();

        foreach ($posts as $postData) {
            $this->createPost($postData);
        }

        // Kategori bazlı post sayılarını kontrol et ve ekle
        $categoryTitles = [
            'Genel Yazılar'        => ['Hayatın Dengesi', 'Gülümsemenin Gücü', 'Zaman Yönetimi Sanatı', 'Kuşaklar Arası İletişim', 'Kitap Okuma Alışkanlığı', 'Başarıya Giden Yol', 'Mutluluk Arayışı', 'Dinlenmenin Önemi', 'Sabır ve Azim', 'Yaşam Kalitesini Artırma'],
            'Kişisel Gelişim'      => ['Kendini Tanıma Yolculuğu', 'Özgüven İnşası', 'Hedef Belirleme Stratejileri', 'Duygusal Zeka Gelişimi', 'Motivasyon Kaynakları', 'Konuşma Sanatı', 'Karar Verme Süreçleri', 'Stres Yönetimi Teknikleri', 'Yaratıcı Düşünme', 'Liderlik Vasıfları'],
            'Çocuk Yetiştirme'     => ['Çocuklarda Oyunun Önemi', 'Disiplin ve Sevgi Dengesi', 'Ekran Bağımlılığıyla Mücadele', 'Ergenlik Dönemi Sorunları', 'Sorumluluk Bilinci Kazandırma', 'Çocuklarda Özgüven Gelişimi', 'Kardeş Kıskançlığı', 'Kitap Sevgisi Aşılamak', 'Okul Başarısını Artırma', 'Çocukla Kaliteli Vakit'],
            'Aile ve İlişkiler'    => ['Eşler Arası Sağlıklı İletişim', 'Aile İçi Huzur', 'Rol Çatışmaları', 'Geniş Aile Sorunları', 'Güven İnşası', 'Tartışma Kültürü', 'Birlikte Vakit Geçirme', 'Empati ve Anlayış', 'Kriz Yönetimi', 'Sevgi Dili'],
            'Aile İletişimi'       => ['Etkin Dinleme Teknikleri', 'Açık İletişimin Önemi', 'Sözel Olmayan Mesajlar', 'Ortak Dil Oluşturmak', 'Geri Bildirim Sanatı', 'Anlaşılma İhtiyacı', 'Doğru Soru Sorma', 'Öfke Kontrolü', 'Çatışma Çözme', 'Hoşgörü İklimi'],
            'Psikoloji ve Sağlık'  => ['Ruh Sağlığını Korumak', 'Kaygı ile Başa Çıkma', 'Depresyon Belirtileri', 'Uyku Düzeni ve Psikoloji', 'Beslenme ve Ruh Hali', 'Pozitif Bakış Açısı', 'Vücut Dili ve Ruh', 'Panik Atakla Mücadele', 'Hafıza Güçlendirme', 'Zihinsel Arınma'],
            'Eğitim'               => ['Modern Eğitim Yaklaşımları', 'Öğretmen-Öğrenci İlişkisi', 'Sınav Kaygısını Yenmek', 'Yaşam Boyu Öğrenme', 'Okul Öncesi Eğitimin Önemi', 'Dijital Eğitim Araçları', 'Meslek Seçimi Rehberi', 'Yabancı Dil Öğrenme', 'Sanat ve Eğitim', 'Sporun Eğitime Katkısı'],
            'Teknoloji ve Toplum'   => ['Dijital Çağda İnsan Olmak', 'Yapay Zeka ve Geleceğimiz', 'Sosyal Medya Etikleri', 'Siber Güvenlik Farkındalığı', 'Teknoloji Detoksu', 'İnternetin Sosyolojik Etkisi', 'Mobil Uygulamaların Gücü', 'Veri Gizliliği', 'E-Ticaret ve Değişim', 'Geleceğin Meslekleri'],
            'Manevi Yazılar'       => ['Gönül Dünyamızda Yolculuk', 'Şükür Bilinci', 'Affetmenin Huzuru', 'Kalp Kırmamak', 'Merhamet ve Vicdan', 'Manevi Boşluk ve Arayış', 'İmanın Tadı', 'Dua ve Rezzak', 'Güzel Ahlak', 'Ömür Muhasebesi'],
            'Dini Bilgiler'        => ['İbadetin Özü', 'Sünnete Uygun Yaşam', 'İhlas ve Samimiyet', 'Helal Kazanç Hassasiyeti', 'Kuranın Rehberliği', 'Peygamber Ahlakı', 'Sabrın Mükafatı', 'Zekat ve Yardımlaşma', 'Gıybet ve Etkileri', 'Zikir ve Tefekkür'],
            'Genel'                => ['Hayata Bakış Açısı', 'Küçük Mutluluklar', 'Komşuluk Hakları', 'Doğa ve İnsan', 'Yardımlaşma Kültürü', 'Dürüstlük ve Güven', 'Saygı ve Hoşgörü', 'Paylaşmanın Güzelliği', 'Adalet Duygusu', 'Vefa Borcu'],
        ];

        // Kategori bazlı görsel anahtar kelimeleri
        $categoryKeywords = [
            'Genel Yazılar'        => 'nature,life,path,mountain,river',
            'Kişisel Gelişim'      => 'growth,mind,success,climbing,meditation',
            'Çocuk Yetiştirme'     => 'child,play,baby,kids,park',
            'Aile ve İlişkiler'    => 'family,couple,home,love,dinner',
            'Aile İletişimi'       => 'talk,chat,listen,friendship,community',
            'Psikoloji ve Sağlık'  => 'brain,mind,health,calm,yoga',
            'Eğitim'               => 'book,school,study,library,pencil',
            'Teknoloji ve Toplum'   => 'tech,digital,robot,coding,future',
            'Manevi Yazılar'       => 'spirituality,peace,prayer,light,clouds',
            'Dini Bilgiler'        => 'mosque,prayer,quran,islamic,star',
            'Genel'                => 'abstract,texture,city,landscape,ocean',
        ];

        foreach (Category::all() as $category) {
            $currentCount = Post::where('category_id', $category->id)->count();
            if ($currentCount < 10) {
                $needed = 10 - $currentCount;
                $titles = $categoryTitles[$category->name] ?? $categoryTitles['Genel'];
                $keyword = $categoryKeywords[$category->name] ?? $categoryKeywords['Genel'];
                
                for ($i = 0; $i < $needed; $i++) {
                    $title = $titles[$i] ?? ($category->name . ' - Makale ' . ($i + 1));
                    
                    // Benzersiz görsel URL'si oluştur (Unsplash sig parametresi ile)
                    $imageUrl = "https://images.unsplash.com/photo-" . (1500000000000 + $category->id * 1000 + $i) . "?w=800&q=80&sig=" . ($category->id * 100 + $i) . "&q=" . urlencode($keyword);
                    // Alternatif olarak Unsplash source (legacy ama bazen daha iyi sonuç veriyor) yerine daha güvenilir rastgele görsel yöntemi:
                    $imageUrl = "https://picsum.photos/seed/" . md5($title) . "/800/600";
                    // Ama Unsplash daha kaliteli olduğu için keyword bazlı Unsplash kullanalım:
                    $imageUrl = "https://loremflickr.com/800/600/" . str_replace(',', ' ', $keyword) . "?lock=" . ($category->id * 100 + $i);

                    $this->createPost([
                        'title'        => $title,
                        'excerpt'      => $category->name . ' alanında güncel ve özgün bir perspektif sunan bu yazı, ' . $title . ' konusuna odaklanmaktadır.',
                        'content'      => $category->name . ' dünyasına dair önemli bir çalışma olan "' . $title . '" makalemizde, hayata dair derinlemesine analizler ve pratik öneriler bulacaksınız. ' . $category->name . ' üzerine yaptığımız bu araştırma, bireyin gelişim yolculuğunda yeni ufuklar açmayı hedeflemektedir. Modern dünyada ' . $category->name . ' konusunun önemi her geçen gün artmaktadır.',
                        'image'        => $imageUrl,
                        'cat'          => $category->id,
                        'published_at' => now()->subDays($i + 10)->toDateString(),
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
            'excerpt'      => $postData['excerpt'],
            'category_id'  => $postData['cat'],
            'image'        => $postData['image'],
            'is_published' => true,
        ]);
    }
}
