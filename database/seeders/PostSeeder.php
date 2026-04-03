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

        $posts = [
            [
                'title'   => 'VARDİYA NE DEMEK? HAYATI MOLALARA BÖLMEK Mİ DEMEK?',
                'excerpt' => 'Vardiya sistemi, milyonlarca insanın hayatını molalara bölen bir düzendir. Peki bu düzen insanı nasıl etkiliyor?',
                'content' => '
                    <p>Vardiya sistemi, modern sanayi toplumunun vazgeçilmez ancak bir o kadar da yıpratıcı bir gerçeğidir. İnsan doğası güneşle uyanmaya ve karanlıkla dinlenmeye programlanmışken, vardiyalı çalışma bu biyolojik saati temelinden sarsar. Bir fabrikanın bacası tütmeye devam etsin diye binlerce insan geceyi gündüze katar. Bu, sadece bir çalışma saati değişikliği değil, bir yaşam biçimi tercihidir.</p>
                    <p>Gece vardiyasında çalışan bir babanın, sabah eve döndüğünde çocuklarının okula gidişini izlemesi, onlarla kahvaltı edememesi sessiz bir hüzündür. Sosyal hayat, arkadaş toplantıları ve aile yemekleri genellikle bu "tersine dönmüş" hayatın dışında kalır. Toplum gündüz yaşarken, vardiyalı işçi sessizliğe ve uykuya mahkumdur. Ancak bu uyku hiçbir zaman güneş altındaki kadar derin ve dinlendirici olmaz.</p>
                    <p>Sağlık açısından bakıldığında, vücut sürekli bir jet-lag etkisi altındadır. Melatonin salgılanması bozulur, sindirim sistemi düzensizleşir ve stres seviyesi kronik bir hal alır. Vardiya demek, hayatı molalara bölmek, bazen de o molaların içinde kaybolmak demektir. Sosyal çevreden kopuş, bir süre sonra derin bir yalnızlık hissini beraberinde getirebilir.</p>
                    <p>İnsan ilişkileri de bu durumdan nasibini alır. Eşlerin birbirini sadece kapı eşiğinde görmesi, paylaşılan anların kısalması iletişimi zayıflatabilir. Çocuklar için "fantom bir baba" veya "uyuyan bir anne" figürü ortaya çıkar. Her ne kadar ekonomik gereklilikler bu sistemi zorunlu kılsa da, bedeli genellikle psikolojik ve sosyal refahtan ödenir.</p>
                    <p>Endüstriyel dönemin getirdiği bu zorunluluk, insanın en temel ihtiyaçlarından biri olan rutin düzeni altüst eder. Bir insan kaç geceyi gündüzüne katabilir? Kaç kahvaltıyı kaçırabilir? Vardiya sisteminde çalışmak, bir nevi görünmez bir kahramanlıktır; ancak bu kahramanlığın yorgunluğu gözlerin altındaki morluklarda gizlidir. Hayat, vardiyalar arasında sıkışıp kalan kısa nefeslerden ibaret hale gelmemelidir.</p>
                    <p>Sonuç olarak vardiya sistemi, teknik bir düzenleme olmanın çok ötesindedir. O, milyonlarca insanın sessiz çığlığı, feda edilen uykuları ve bölünmüş rüyalarıdır. Modern dünyanın bu çarkı dönerken, içindeki insan dişlilerin aşınması kaçınılmazdır. Bu yüzden vardiyalı çalışanların sosyal ve psikolojik destek mekanizmalarına her zamankinden daha çok ihtiyacı vardır.</p>
                ',
                'image'   => 'images/posts/asagilik.jpg',
                'cat'     => $catGelisim->id,
            ],
            [
                'title'   => 'AŞAĞILIK KOMPLEKSİ ŞİDDETE NEDEN OLUR MU?',
                'excerpt' => 'Aşağılık kompleksi, bireyin kendini başkalarından yetersiz hissetmesiyle ortaya çıkar. Bu duygu saldırganlığa dönüşebilir mi?',
                'content' => '
                    <p>Aşağılık kompleksi, Alfred Adler tarafından literatüre kazandırılan ve bireyin kendini başkalarından daha değersiz, yetersiz veya eksik hissetmesi durumudur. Ancak bu masum bir üzüntüden ziyade, derinlerde kaynayan bir volkan gibidir. Birey, bu içsel yetersizlik duygusunu bastırmak veya telafi etmek için bazen yıkıcı yollara başvurabilir.</p>
                    <p>Şiddet, genellikle bir güç gösterisi olarak algılansa da, aslında en büyük güçsüzlüğün dışavurumudur. Kendini yetersiz hisseden biri, bu boşluğu doldurmak için başkaları üzerinde tahakküm kurmaya çalışır. "Ben küçüğüm, ama seni ezerek büyük olduğumu kanıtlayabilirim" mantığı, bilinçaltında şiddetin kapısını aralar. Bu durum hem bireysel hem de toplumsal düzeyde kendini gösterir.</p>
                    <p>Tarih boyunca pek çok diktatörün ve saldırgan liderin çocukluklarında yoğun aşağılık duyguları ve ezilmişlik hisleri yaşadığı görülmüştür. Bu derin yara, büyüdüğünde tüm dünyayı yakma isteğine dönüşebilir. Kişi, içindeki eksikliği dışarıdaki insanları eksilterek tamamlamaya çalışır. Bu, psikolojik bir savunma mekanizmasıdır ancak sonuçları felaket olabilir.</p>
                    <p>İlişkilerde de benzer bir dinamik işler. Partnerine şiddet uygulayan birinin temel motivasyonu genellikle kendi yetersizliğini örtbas etme çabasıdır. Partnerini kontrol ederek, onu küçülterek kendi üzerindeki aşağılık duygusundan kaçmaya çalışır. Şiddet burada bir "dengeleyici" rolü üstlenir; ancak bu denge sahte ve yıkıcıdır.</p>
                    <p>Bu döngüyü kırmanın yolu, bireyin kendi değerini dış faktörlere veya başkalarıyla kıyaslamaya bağlamadan inşa etmesidir. Kişi kendini olduğu gibi kabul etmediği sürece, içindeki o eksiklik duygusu dışarıya saldırganlık olarak sızacaktır. Toplumsal şiddeti önlemek, bireylerin ruhsal bütünlüğünü ve özsaygısını güçlendirmekten geçer.</p>
                    <p>Özetle, aşağılık kompleksi ve şiddet arasında doğrudan ve güçlü bir bağ vardır. Yetersizlik hissiyle başa çıkamayan zihin, en kolay kaçış yolu olarak kaba kuvveti seçer. Bu yüzden, şiddetle mücadele sadece yasal bir süreç değil, aynı zamanda derin bir psikolojik iyileşme sürecidir. İnsanın kendiyle barışması, dünyayla barışmasının ilk adımıdır.</p>
                ',
                'image'   => 'images/posts/asagilik.jpg',
                'cat'     => $catPsiko->id,
            ],
            [
                'title'   => 'BABA YARASI MI? KALP AÇLIĞI MI?',
                'excerpt' => 'Baba figürü bir çocuğun hayatında en güvenli limandır. Bu limanın eksikliği derin yaralar açabilir.',
                'content' => '
                    <p>Bir çocuğun dünyasında baba, sadece bir ebeveyn değil, aynı zamanda dış dünyaya açılan ilk kapıdır. Baba, güvenliğin, otoritenin ve korunmanın sembolüdür. Eğer bu kapı kapalıysa veya eksikse, çocuğun ruhunda asla tam anlamıyla kapanmayan bir "baba yarası" açılır. Bu yara, fiziksel bir eksiklikten ziyade, duygusal bir yoksunluktan beslenir.</p>
                    <p>Kalp açlığı, bir çocuğun babasından beklediği onay, takdir ve şefkatten mahrum kalmasıdır. Karnı doyan ama kalbi aç kalan bir çocuk, hayatı boyunca bu boşluğu dolduracak bir şeyler arar. Bazen bu arayış yanlış ilişkilerde, bazen başarı hırsında, bazen de bağımlılıklarda kendini gösterir. Babasının gözünde parlamayan bir çocuk, dünyayı aydınlatmaya çalışırken kendini tüketebilir.</p>
                    <p>Baba yarası olan bireyler, genellikle otoriteyle sorun yaşarlar ya da aşırı uyumlu bir karakter sergilerler. Kendi değerlerini bir türlü tam olarak hissedemezler çünkü ilk referans noktaları olan babadan bu geri bildirimi alamamışlardır. "Ben yeterli miyim?" sorusu, zihinlerinde sürekli yankılanan bitmek bilmez bir melodidir.</p>
                    <p>Psikolojik araştırmalar, baba figürünün eksikliğinin veya mesafeli duruşunun, çocukların ileride kuracağı romantik ilişkileri de doğrudan etkilediğini gösteriyor. Özellikle kız çocukları, babalarından göremedikleri sevgiyi dışarıda ararken kendilerini sömürücü ilişkilerin içinde bulabilirler. Erkek çocukları ise "erkeklik" tanımını sağlıklı bir figür üzerinden yapamadıkları için ya aşırı sert ya da aşırı pasif kalabilirler.</p>
                    <p>Bu yarayı iyileştirmek mümkündür ancak sabır gerektirir. İlk adım, bu boşluğun varlığını kabul etmektir. Kendi kendine babalık yapmayı öğrenmek, içindeki o küçük çocuğu teselli etmek ve babasının vermediği değerini kendi içinden bulup çıkarmak bir olgunlaşma sürecidir. Kalp açlığı, dışarıdan gelenle değil, içerideki sevgi kaynağının keşfiyle doyurulur.</p>
                    <p>Sonuç olarak, babasızlık veya duygusal olarak eksik babalık, bir kader değildir. Bu yara, insanın kendini bulma yolculuğunda bir duraktır. Kalp açlığını fark eden kişi, başkalarına muhtaç olmadan kendi sofrasını kurmayı öğrendiğinde gerçek özgürlüğüne kavuşur. Baba yarası, bilgeleşmenin ve derinleşmenin bir aracı haline dönüşebilir.</p>
                ',
                'image'   => 'images/posts/baba.jpg',
                'cat'     => $catAile->id,
            ],
            [
                'title'   => 'PROBLEM GENÇLERDE Mİ? AİLELERDE Mİ?',
                'excerpt' => 'Gençlik dönemi fırtınalı bir dönemdir. Ancak bu fırtınanın kaynağı sadece gençler mi, yoksa aile içi iletişim mi?',
                'content' => '
                    <p>Toplumda sıkça duyduğumuz "şimdiki gençler çok sorunlu" cümlesi, aslında madalyonun sadece bir yüzünü gösterir. Gençlik dönemi, doğası gereği bir kimlik arayışı ve başkaldırı sürecidir; ancak bu sürecin ne kadar hasarlı veya sağlıklı ilerleyeceği doğrudan ailenin attığı temellere bağlıdır. Genç, aslında ailenin bir yansımasıdır; bir semptomdur.</p>
                    <p>Aile içindeki iletişimsizlik, baskı, ilgisizlik veya aşırı korumacı tutumlar, gencin dünyasında farklı patlamalara neden olur. Eğer bir ailede sorunlar konuşulmak yerine halının altına süpürülüyorsa, gencin bu sorunları dışarıda farklı şekillerde dışavurması kaçınılmazdır. Şiddet eğilimi, madde kullanımı veya içe kapanma genellikle bir çağrıdır: "Lütfen beni görün!"</p>
                    <p>Ebeveynlerin çocuklarından beklentileri ile çocukların gerçekliği arasındaki uçurum büyüdükçe, çatışma da kaçınılmaz hale gelir. Aileler genellikle çocuklarına sundukları maddi imkanlarla görevlerini tamamladıklarını düşünürler. Ancak bir gencin en çok ihtiyaç duyduğu şey iPhone değil, anlaşıldığını hissettiği, yargılanmadan dinlendiği güvenli bir sohbet ortamıdır.</p>
                    <p>Problem olarak görülen pek çok davranış, aslında gencin kendini koruma kalkanıdır. Eğer evde sürekli eleştirilen, kıyaslanan veya küçümsenen bir genç varsa, o gencin dış dünyada uyumlu ve huzurlu olması beklenemez. Aile, çocuğun ruhsal kökleridir. Kökleri zehirlenmiş bir ağacın meyvelerinin tatlı olmasını beklemek haksızlıktır.</p>
                    <p>Çözüm, parmak sallayarak nasihat etmekten değil, aynayı kendine çevirmekten geçer. Ebeveynler "Biz nerede hata yapıyoruz?" sorusunu dürüstçe sorabildiklerinde, iyileşme başlar. Gençleri suçlamak en kolay yoldur; zor olan ise aile içindeki hiyerarşiyi ve sevgi dilini yeniden inşa etmektir. Gençlik fırtınasında aile, devrilen bir ağaç değil, güvenli bir liman olmalıdır.</p>
                    <p>Netice itibariyle, gençlerin problemleri genellikle sistemik sorunların bireysel tezahürleridir. Sağlıklı bir toplum istiyorsak, önce sağlıklı aile yapıları kurmak zorundayız. Genci suçlamaktan vazgeçip onu anlamaya çalışmak, sorunların yarısını daha en baştan çözecektir. Gençler geleceğimizse, aileler o geleceğin mimarlarıdır.</p>
                ',
                'image'   => 'images/posts/aile.jpg',
                'cat'     => $catAile->id,
            ],
            [
                'title'   => 'HANGİ EĞİTİM SİSTEMİ? HAYATA BAĞLAYAN MI?',
                'excerpt' => 'Eğitim, inşa ettiği kadar imha edebilecek bir güce sahiptir. İyi öğretmenlik arayışında yeni bir ufuk açmalıyız.',
                'content' => '
                    <p>Eğitim sistemi denildiğinde akla ilk gelen genellikle sınavlar, notlar ve diplomalar olur. Ancak gerçek eğitim, bir insanın ruhunu uyandırma ve potansiyelini keşfetme sürecidir. Mevcut sistemlerin çoğu, çocukları tek tip bir şablona uydurmaya çalışırken onların özgün renklerini solduruyor. Bu durum, eğitim değil, bir nevi "ehlileştirme" sürecine dönüşüyor.</p>
                    <p>Hayata bağlayan eğitim, öğrenciye sadece bilgi yüklemesi yapmaz, aynı zamanda o bilgiyi nasıl kullanacağını ve hayata nasıl anlam katacağını öğretir. Bir çocuğun matematikten yüz alması kadar, bir başkasının acısına ortak olabilmesi, eleştirel düşünebilmesi ve merak duygusunu koruyabilmesi de önemlidir. Eğitim, hayatın kendisinden kopuk bir laboratuvar deneyi olmamalıdır.</p>
                    <p>Öğretmenlik mesleği bu noktada kilit bir role sahiptir. İyi bir öğretmen, sadece müfredatı aktaran bir memur değil, öğrencinin içindeki ışığı fark eden bir rehberdir. Entelektüel birikimin yanına duygusal zekayı ve manevi derinliği de ekleyen öğretmenler, kalıcı izler bırakırlar. Öğrenciye sevgiyle dokunmayan bir bilgi, sadece kağıt üzerinde kalan soğuk bir veriden ibarettir.</p>
                    <p>Günümüzde teknolojiyle iç içe geçmiş bir eğitim modeline ihtiyaç duysak da, insani değerlerin bu modelin merkezinde kalması şarttır. Yapay zekanın her şeyi bildiği bir dünyada, insanın farkı "hissetmek" ve "etik değerler üretmek" olacaktır. Eğitim, bu yetenekleri köreltmek yerine beslemelidir. Hayattan kopuk bir okul, öğrencisini hayata hazırlayamaz.</p>
                    <p>Her çocuğun öğrenme ritmi ve ilgi alanı farklıdır. Fabrika üretimi gibi işleyen bir eğitim anlayışı, dahi olabilecek pek çok zihni "başarısız" etiketiyle kenara itmektedir. Gerçek başarı, bireyin kendi sınırlarını aşması ve topluma faydalı, mutlu bir birey haline gelmesidir. Bunun için de daha esnek, daha insan odaklı ve daha cesur eğitim modellerine ihtiyacımız var.</p>
                    <p>Son süzgece geldiğimizde, eğitim bir araçtır; amaç ise kâmil insan olmaktır. Bize sadece meslek sahibi olanlar değil, aynı zamanda karakter sahibi olan vicdanlı bireyler lazımdır. Hayata bağlayan eğitim, mezun olduğunda "şimdi ne yapacağım?" diye soran değil, "hayata ne katabilirim?" diyen gençler yetiştirir. Bu değişim, yarınlarımızın teminatıdır.</p>
                ',
                'image'   => 'images/posts/egitim.jpg',
                'cat'     => $catEgitim->id,
            ],
            [
                'title'   => 'HATALARDAN DERS ALMALI MI?',
                'excerpt' => 'Süt bozulursa yoğurt olur. Yoğurt sütten daha değerlidir. Hatalar yaptığın için kötü değilsin, deneyimlisin.',
                'content' => '
                    <p>İnsan doğası gereği hata yapmaya meyillidir. Ancak toplum bize genellikle mükemmel olmayı ve hatasız ilerlemeyi dayatır. Oysa gelişim, hata payında gizlidir. Hata yapmak, bir son değil, yeni bir başlangıcın ve öğrenmenin ön koşuludur. Sütün bozulup yoğurda, yoğurdun ise peynire dönüşmesi gibi; hatalar da bizi dönüştürür ve olgunlaştırır.</p>
                    <p>Hata yapmaktan korkan bir zihin, yeni yollar denemekten de korkar. Bu korku, yaratıcılığın ve ilerlemenin en büyük düşmanıdır. Başarılı insanların biyografilerine baktığımızda, hepsinin devasa başarısızlıklar ve hatalar silsilesinden geçtiğini görürüz. Onları farklı kılan hata yapmamış olmaları değil, hatalarının üzerinde yükselmeyi bilmiş olmalarıdır.</p>
                    <p>Bir hatayı "ders" haline getirmek için önce onu kabul etmek gerekir. Suçu başkasına atmak veya bahanelerin arkasına sığınmak, öğrenme sürecini durdurur. "Neyi farklı yapabilirdim?" sorusu, bilincin uyanışıdır. Hata, bize ne yapmamamız gerektiğini öğreterek, doğruya giden yolu daraltır ve berraklaştırır. Bu, deneme yanılma yönteminin bilgeliğidir.</p>
                    <p>Özellikle çocuk yetiştirirken hatalara yaklaşıman şekli, çocuğun tüm hayatını etkiler. Hata yaptığı için azarlanan bir çocuk, ileride risk almaktan kaçınan çekingen bir yetişkin olur. Oysa hatayı bir büyüme fırsatı olarak gören bir ortamda yetişen birey, düştüğünde kalkmayı ve tozunu silkeleyip yola devam etmeyi öğrenir. Hatalar, karakterimizin antrenmanlarıdır.</p>
                    <p>Hataların getirdiği acı ve pişmanlık, bazen en iyi öğretmendir. Duygusal zeka, bu acıyı tecrübeye dönüştürme yeteneğidir. Geçmişe takılıp kalmak değil, geçmişin derslerini bugüne taşıyıp yarını inşa etmek esastır. Kimse aynı nehirde iki kez yıkanmaz; aynı şekilde kimse aynı hatayı iki kez yapmamalıdır. Eğer yapıyorsa, o artık bir hata değil, bir tercihtir.</p>
                    <p>Özetlemek gerekirse, hatalar bizi insan kılar. Mükemmellik bir illüzyondur, oysa gelişmek bir gerçektir. Hatalarından kaçan kişi yerinde sayar; hatalarını kucaklayıp onlardan bilgece dersler çıkaran kişi ise hayat yolunda emin adımlarla ilerler. Unutmayın ki, en parlak yıldızlar bile devasa çarpışmalar ve kaoslar sonucunda oluşur. Kendinize hata yapma izni verin.</p>
                ',
                'image'   => 'images/posts/hata.jpg',
                'cat'     => $catGelisim->id,
            ],
            [
                'title'   => 'DEPRESYONDA MIYIZ? BELİRTİLER NELER?',
                'excerpt' => 'Herkes zaman zaman kendini değersiz hissedebilir. Bu depresyon mu yoksa geçici bir hüzün mü?',
                'content' => '
                    <p>Günümüzün hızlı ve rekabetçi dünyasında "kendini kötü hissetmek" neredeyse bir tabu haline geldi. Sosyal medya herkesin çok mutlu olduğunu haykırırken, sessizce içine kapanan insanların sayısı her geçen gün artıyor. Peki, yaşadığımız şey sadece geçici bir hüzün mü yoksa klinik bir depresyonun ayak sesleri mi? Bu ayrımı yapmak hayati önem taşır.</p>
                    <p>Depresyon sadece üzgün olmak değildir; o, renklerin solması, yaşam sevincinin asit gibi erimesidir. En sevdiğiniz aktivitelerin bile bir anlam ifade etmediği, yataktan kalkmanın bir maraton koşmak kadar zor geldiği bir ruh halidir. Bu durum, iradeyle aşılabilecek basit bir "kendine gel" meselesi değil, biyolojik ve psikolojik bir süreçtir.</p>
                    <p>Belirtiler genellikle sinsi başlar. Uyku düzeninin bozulması, iştah değişiklikleri, kronik yorgunluk hissi ve odaklanma güçlüğü ilk sinyallerdir. Kişi kendini değersiz, suçlu ve umutsuz hissetmeye başlar. Sanki tüm dünya bir camın arkasındadır ve siz ona dokunamazsınız. Bu büyük yalnızlık, depresyonun en acı veren yüzlerinden biridir.</p>
                    <p>Fiziksel ağrılar da depresyona eşlik edebilir. Sebebi bulunamayan baş ağrıları, mide sorunları veya eklem sancıları, ruhun vücut üzerinden yardım çığlığı atmasıdır. Beyindeki kimyasalların dengesinin değişmesi, tüm vücut sistemini etkiler. Bu yüzden depresyon bir "akıl hastalığı" olduğu kadar, bir "vücut hastalığı" olarak da kabul edilmelidir.</p>
                    <p>Toplumsal baskı ve "güçlü görünme" zorunluluğu, kişiyi yardım istemekten alıkoyabilir. Oysa yardım istemek en büyük güçtür. Profesyonel bir destek, psikoterapi ve gerektiğinde ilaç tedavisi, bu karanlık tünelin sonundaki ışığı görmeyi sağlar. Kimse bu süreci tek başına omuzlamak zorunda değildir ve bu durum bir zayıflık işareti asla değildir.</p>
                    <p>Kapanışta şunu söylemek gerekir: Depresyon bir kader değil, tedavi edilebilir bir durumdur. Kendinize karşı nazik olun, duygularınızı bastırmayın ve profesyonel bir elin uzanmasına izin verin. Ruhun fırtınaları ne kadar sert olursa olsun, her fırtınanın bir sonu vardır. Önemli olan o fırtınada kaybolmamak için doğru sığınakları ve rehberleri bulmaktır.</p>
                ',
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
            'Genel Yazılar'        => [
                'Hayatın İçinden Kısa Notlar',
                'Günlük Yaşamda Farkındalık',
                'Gözlemlediğimiz Dünya ve Biz',
                'Küçük Şeylerin Büyük Etkileri',
                'Yollar, Yolcular ve Hikayeler'
            ],
            'Kişisel Gelişim'      => [
                'Potansiyelini Keşfetme Yolculuğu',
                'Özgüven İnşasında Temel Adımlar',
                'Zaman Yönetimi mi Yaşam Yönetimi mi?',
                'Konfor Alanından Çıkmanın Gücü',
                'Alışkanlıkların Gizli Mimarisi'
            ],
            'Çocuk Yetiştirme'     => [
                'Çocuklarda Özgüven Gelişimi',
                'Dijital Çağda Ebeveyn Olmak',
                'Çocukla İletişimin Altın Kuralları',
                'Oyunun Çocuk Gelişimindeki Yeri',
                'Sınır Koyma ve Sevgi Dengesi'
            ],
            'Aile ve İlişkiler'    => [
                'Sağlıklı Bir Evliliğin Temelleri',
                'Aile İçi Çatışma Çözme Yolları',
                'Kuşaklar Arası İletişim Köprüleri',
                'Birlikte Vakit Geçirmenin Önemi',
                'Akran Baskısı ve Aile Desteği'
            ],
            'Psikoloji ve Sağlık'  => [
                'Stresle Başa Çıkma Stratejileri',
                'Duygusal Dayanıklılığı Artırmak',
                'Modern Zamanın Hastalığı: Kaygı',
                'Ruh Sağlığı ve Fiziksel Bütünlük',
                'İçsel Huzura Giden Psikolojik Yol'
            ],
            'Eğitim'               => [
                'Modern Eğitimde Yeni Yaklaşımlar',
                'Ömür Boyu Öğrenme Felsefesi',
                'Öğrenmeyi Öğrenmek Neden Önemli?',
                'Okul Sadece Bir Bina mı?',
                'Geleceğin Yetkinliklerini Kazanmak'
            ],
            'Teknoloji ve Toplum'   => [
                'Yapay Zeka ve İnsan Geleceği',
                'Sosyal Medyanın Sosyal Yapıya Etkisi',
                'Veri Gizliliği ve Dijital Ayak İzi',
                'Teknoloji Bağımlılığı ile Mücadele',
                'Dijital Dönüşümün Toplumsal Sonuçları'
            ],
            'Manevi Yazılar'       => [
                'Kalbin Huzuru ve Maneviyat',
                'İnanç ve İnsan Psikolojisi',
                'Modern Dünyada Anlam Arayışı',
                'Şükretmenin İyileştirici Gücü',
                'İçsel Yolculuk ve Olgunlaşma'
            ],
        ];

        foreach (Category::all() as $category) {
            $currentCount = Post::where('category_id', $category->id)->count();
            if ($currentCount < 5) {
                $needed = 5 - $currentCount;
                $titles = $categoryKeywords[$category->name] ?? [];
                
                for ($i = 0; $i < $needed; $i++) {
                    $title = $titles[$i] ?? ($category->name . ' - ' . ($i + 1) . '. Makale');
                    $content = "";
                    for($j=1; $j<=8; $j++) {
                        $content .= "<p>" . $category->name . " üzerine kaleme alınmış bu çalışmanın " . $j . ". bölümünde, konunun ne kadar derin bir toplumsal karşılığı olduğunu görüyoruz. " . $title . " başlığı altında incelediğimiz bu dinamikler, aslında bizim potansiyelimizi açığa çıkaran birer anahtar görevi görür. Bu bağlamda, her yeni veri, bize kendimizi ve dünyayı daha iyi anlama fırsatı sunmaktadır.</p>";
                        $content .= "<p>İlerleyen aşamalarda, " . $title . " konusunun bireysel psikoloji ve toplumsal yapı üzerindeki yansımalarını daha net bir şekilde göreceğiz. Unutulmamalıdır ki, değişim önce zihinde başlar ve ardından tüm hayata yayılır. Bu makale serisi, size bu değişim yolculuğunda rehberlik etmeyi amaçlamaktadır. Her satırda yeni bir perspektif ve her paragrafta yeni bir ufuk sizi bekliyor olacak.</p>";
                    }

                    $this->createPost([
                        'title'        => $title,
                        'excerpt'      => $title . ' konusu üzerine kaleme alınmış derinlemesine bir bakış açısı ve analizler.',
                        'content'      => $content,
                        'image'        => 'images/posts/egitim.jpg', 
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
