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
                'id'      => 927,
                'title'   => 'VARDİYA NE DEMEK? HAYATI MOLALARA BÖLMEK Mİ DEMEK? KISIK SES, KISIK HAYAT MI DEMEK?',
                'excerpt' => 'Vardiya sistemi, milyonlarca insanın hayatını molalara bölen bir düzendir. Peki bu düzen insanı nasıl etkiliyor?',
                'content' => '
                    <!-- wp:paragraph --> <p>Geçen ay ki yazımızda baba yarası yazısı ile çocuklarına psikolojik sıkıntı yaratan babaları anlatmıştık. Bu yazımızda ise fedakâr babaların durumunu anlatmak istedik. Yazıyı kim yazmış bilmiyorum ama bu yazının kahramanı yüzlerce baba var. Özellikle eşi de kendisi gibi vardiyalı çalışıyorsa o evin çocukları hep bir yanı yarım kalır. Maalesef severek evlenen sağlıkçı ve asker veya polis kökenli ailelerde bu durum daha çok yaşanmaktadır. Allah o anne ve babalardan razı olsun hayatları hep fedakârlıkla geçmektedir.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Sabahın erken saatleriydi. Ali, henüz uyuyan oğlunun üzerini battaniyeyle örttü. Ev sessizdi, ama babanın içindeki sorumluluk duygusu her zamanki gibi yüksekti. Çantasını aldı, kapıyı sessizce kapattı. Çalıştığı fabrika şehrin diğer ucundaydı ama onun için yolun uzunluğu önemli değildi. Önemli olan, evde geçen her günün oğluna daha güzel bir gelecek sunmasıydı. Fabrikada çalışma zordu. Makine gürültüsü, ağır işler, ter içinde geçen uzun saatler… Ama Ali hiçbir zaman şikâyet etmedi. Çünkü eve döndüğünde kapıda koşarak “Baba geldiii!” diye sarılan küçük Yusuf’un mutluluğu, bütün yorgunluğunu unutturuyordu.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Bir gün işten geç çıktı. Soğuk bir kış gecesiydi. Cebinde kendi için aldığı tek simidi vardı. Acıkmıştı ama simidi yemedi. Eve döndüğünde Yusuf uyanıktı ve “Baba acıktım” dediğinde Ali, gülümseyerek simidi oğlunun eline verdi. Yusuf simidin bir parçasını kırıp “Sen yemedin mi?” diye sorunca Ali gözlerini kaçırdı: “Ben tokum oğlum, sen ye.” O gece, oğlunun başını okşarken içinden bir cümle geçti: “Baba olmak, kendi açlığını değil; evladının doygunluğunu düşünmektir.”</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Ve Ali o gece de, diğer tüm günlerde olduğu gibi, sessizce fedakârlığını sürdürdü.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Vardiya demek… Dışarıdan bakınca sadece “gece çalışmak” sanılır. Ama içeride, evin içinde, kalbin içinde başka bir hayat akar. Mesela çocuklar. Daha üç yaşındayken bile ezberlerler o cümleyi: “Sessiz ol… Baban uyuyor.” Kafalarında baba = karanlık oda. Baba = uyuyan biri. Baba = “şu an gidilmez”. O yüzden bazı çocuklar, babayı ancak ayakkabılarının çıkarılış sesinden tanır. Kapının kilidi dönünce irkilerek büyürler. “Geldi ama yine uyuyacak” diye içleri burkulur.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Vardiyalı babanın çocukları en çok neyi öğrenir biliyor musun? Kendi duygusunu kısmayı. Ağlamayı kısmayı. Oyun sesini kısmayı. Kahkahasını kısmayı. İsteklerini kısmayı. Ve fark etmeden, hayatta en çok sevdiği kişiye yaklaşırken bile adımlarını sessizleştirmeyi…</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Bazı babalar ise… Güneş doğarken eve döner ama evden kopar. Çünkü herkes uyanıktayken o bitiktir. Herkes konuşmak isterken o sustadır. Herkes kahvaltıdayken o karanlıktadır. Bazen çocuk “Baba parka gidelim” der, Ama babanın gözleri kapanır. “Bugün olmaz.” Çocuk bunu “Benim yüzümden” diye kodlar. Anne bunu “İşi çok zor” diye açıklar. Baba bunu “Elimden gelen bu” diye bilir.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Ama gerçekte olan şudur: Vardiya sadece babayı değil, ailesini de böler. Gece çalışan babanın eşi de yalnızdır. Aynı evde iki ayrı zaman dilimi yaşayan iki yabancı gibi dolaşırlar. Biri uyurken diğeri uyanıktır. Biri işe giderken diğeri döner. Biri hayata karışırken diğeri hayattan düşer.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Ve kimse bilmez… Gece nöbetinin en zor kısmının soğuk, karanlık, fabrika kokusu değil; sabah eve dönerken boş sokaklarda hissettiğin o sahipsizlik hissi olduğunu. Kimse bilmez… Babanın nefesinin kısa kısa gelişini, çocuğunu öpmeye gidip, onu uyandırmamak için kapıda duraklayıp sessizce geri çekildiğini… Kimse bilmez… Bazı babaların çocuklarını izlemeye bile “izin istemesi” gerektiğini.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>En tehlikeli oluşan şey ise şudur: Çocuğun bilinçaltında sessiz bir çekirdek inanç oluşur: “Ben yük olmamalıyım.” “İsteklerimi söylememeliyim.” “Ses olursam rahatsız ederim.” “Ben görünmez olursam herkes daha mutlu olur.” Bu inanç, yıllar sonra şu şekle dönüşür: — “Hakkımı arayamıyorum.” — “Kendimi ifade edemiyorum.” — “Hayır diyemiyorum.” — “Benim isteklerim önemsiz.” — “Sevildiğimi bile hissedemiyorum.” Ve kimse çözemez sorunun kaynağını. Halbuki yıllar önce, baba gece çalışırken, çocuk fısıldamayı öğrenmiştir.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Gerçek iyileşme nerede başlar? Bir baba, günün hangi saatinde olursa olsun, çocuğunun yanına oturup şöyle dediğinde: “Ben yoktum ama sen hep çok değerliydin.” Bir anne, çocuğuna şöyle söylediğinde: “Baban yorgundu, bu seninle ilgili değildi.” Ve çocuk ilk kez şunu duyduğunda: “Sesin yük değil. Sen yük değilsin. Sen bu evin neşesisin.” İşte o gün, o çocuğun zihninde yıllardır karanlığa atılmış o sessiz çekirdek inanç çözülmeye başlar. Ve evde ilk kez şunu duyarsın: Küçük bir kahkaha. Küçük bir koşu sesi. Küçük bir “Baba hadi gel oynayalım” cümlesi. O ses, gece vardiyasının karanlığını bile yırtar geçer…</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Bu ülkenin ışıkları sabaha kadar yanıyorsa, bir yerlerde uykusunu borca, ömrünü çocuklarına veren bir vardiyalı çalışan vardır.” Tüm vardiyalı çalışanlara selam olsun. Allah güç versin, yollarını açık etsin. Babalar ne mi yapar? Gündüzü yaşarken geceyi düşünür. Tatil planı değil, nöbet listesi takip eder. En çok duyduğu cümle: “Bir gün görünüp bir gün yok oluyorsun.” Uykusu hep yarımdır. Çocuk “Baba uyuyor” diye büyür. Baba uyanınca çocuk da uyanır; düzen diye bir şey kalmaz. Kahvaltı saatleri hep yanlıştır. Kalbi yorulur ama sesi çıkmaz. Eşiyle aynı gün izin bulmak piyangodur. Aile fotoğraflarında çoğu zaman yoktur. Herkese uyumlu saat, ona uymaz. Misafirlik planına göre değil, vardiya planına göre yaşar. Gece çalışanının yüzü hep solgundur. Gün ışığını en çok özleyen odur. Yastığı hep soğuktur; çünkü geç gider, erken kalkar. Hafta sonu onun için diğerlerinden farksızdır. Bayram sabahını çoğu kez yolda karşılar.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>“Biz çıkıyoruz” denir, o kapıya kadar bile gelemez. Göz altları hep yorgun, ruhu hep sabırlıdır. “Biraz dinlen” derler, o sırada ev ve çocuklar da onunladır. Uykusunu alamadığında bile şikâyet etmez. Herkes uyurken o çalışır; herkes çalışırken o ayakta durmaya çalışır. Çocuk ödevi hep onun vardiyasına denk gelir. En çok özlediği şey: aynı sofraya oturmak. Tatilin anlamı: iki vardiya arasında bir kahve. Geceleri üşür, kimse fark etmez. Kendini anlatmaz, “idare ederim” der. Mesai uzayınca evi unutur gibi olur. Yolda uyuyakalma tehlikesini hep yaşar. Çocuğun uyku düzeni, babanın vardiyasına göre bozulur. Sessiz büyüyen çocuk, daha çok gürültü yapar çünkü özler. “Beni duymuyor musun?” sorularına mahcup olur. Hastalandığında bile izin istemekten utanır. Bayram harçlıklarını hep son dakika yetiştirir. Bir gününü anlatmaya kalksa roman olur. Kimseye belli etmez ama içten içe yalnız hisseder. “Seni uykudan uyandırmayayım” cümlesi onu yaralar. Telefonu hep titreşimdedir; korkar ki uyuyakalır. Eşine destek olamadığını düşünüp üzülür. Çocuklarını özlediğini bile gizler. “Uykum var” deyince kimse sebebini anlamaz. Ailesi yanında uyku biriktirir. Evdeyken bile “yarın kaçta mesai var?” diye düşünür. Hayatı molalara bölünmüştür. Sağlığı en çok yıpranan meslek grubudur.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Yeri en kolay doldurulan, ama yokluğu en çok hissedilendir. Çocukları görmese bile gelecekleri için çalışır. Eşi onun için görünmeyen kahramandır. Sabah ezanını çalışırken karşılayanlardandır. Kimse bilmez ama o, evin gerçek direğidir. Babalık çoğu zaman gösterişsizdir. Yüksek sesle konuşmaz, sahneye çıkmaz, övünmez… Ama evin en görünmez kahramanıdır baba. Baba, sırtındaki yükü belli etmeden taşır. Çoğu zaman yorulur, bazen içi acır, bazen hayalleri ertelenir… Ama çocuğunun yüzündeki gülümseme için her şeyi yeniden göze alır. Baba, evin direği gibidir: Bazen rüzgârda sallanır ama asla yıkılmaz. Geceleri herkes uyurken o hâlâ düşünür: “Yarın daha ne yapabilirim?” Babaların fedakârlığı çoğu zaman fark edilmez. Ama attığımız her adımda, başardığımız her şeyde, gizli bir emek, görünmeyen bir alın teri vardır. Çünkü baba olmak şudur: Kendi hayatını küçültüp evladının hayatını büyütmek… Kendi yorgunluğunu saklayıp evladının hayallerini taşımak… Kendi “olmaz”larını unutup evladının “olur”larına güç vermek… Bazen bir sessizliktir baba, bazen bir öğüt, bazen omzumuza konan güven dolu bir el… Ama her zaman, her koşulda bir sığınaktır. Ve insan büyüdükçe anlar ki: Bir babanın sessiz fedakârlığı, hayatın en güçlü dualarından biridir. Baba, “Ben iyiyim” deyip geçer… Oysa o cümlede kaç tane yorgunluk, kaç tane fedakârlık, kaç tane hayal saklıdır. Baba, sessizce güçlü duran en büyük duadır. Bazı kahramanların pelerini yoktur… Ellerinde nasır, omuzlarında yük, ama yüzlerinde hep aynı sakin gülüş vardır. Onlara biz baba deriz. Baba, kendi kırıklarını göstermeyendir. Evlat düşmesin diye karanlıkta yolunu yoklayandır. Fedakârlığın en sessiz hâlidir baba. Bazen bir lokmayı ikiye böler, büyük parçayı “Sen ye” diye uzatır. İşte baba sevgisi budur: Kendinden eksiltip evladına çoğaltmak. Evdeki en sağlam sandığın, babanın omzudur. Hayat ne kadar sarsarsa sarsın, O omuz hiç yere düşmez. Çocukken anlamazsın… Büyüyünce anlarsın: Her rahat nefesinin arkasında bir babanın görünmez mücadelesi vardır. Baba olmak; içindeki fırtınayı saklayıp evladına rüzgâr ettirmemektir. Sessiz bir sığınak gibi… Ayette, Rabbin “kendisinden başkasına ibadet etmeyin, ana-babaya iyi muamele edin” diye hükmetti. Eğer onlardan biri veya her ikisi senin yanında ihtiyarlığa ererse, sakın onlara “öf” bile deme. Onları azarlama, onlara çok yumuşak ve tatlı söyle. Onlara acıyarak tevâzu kanadını indir. Ve “Ya Rabbi, onlar beni çocukken nasıl bakıp büyüttülerse, sen de kendilerine öylece merhamet eyle!” der.” (İsrâ, 23-24)</p> <!-- /wp:paragraph -->
                ',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2026/03/VARDIYA.jpg',
                'cat'     => $catGenel->id,
                'published_at' => '2026-03-24',
            ],
            [
                'id'      => 920,
                'title'   => 'AŞAĞILIK KOMPLEKSİ İNSAN DÖVMEYE VE ÖLDÜRMEYE NEDEN OLUR MU?',
                'excerpt' => 'Aşağılık kompleksi, bireyin kendini başkalarından yetersiz hissetmesiyle ortaya çıkar. Bu duygu bazen kontrolden çıkıp saldırganlığa dönüşebilir.',
                'content' => '
                    <!-- wp:paragraph --> <p>Gün geçmiyor ki trafikte tartışma yüzünden bir kavga ve öldürme olayı olmasın. 1-2 dakikalık gecikme veya sarı ışıkta geçme kavgası yüzünden insanlar bir ömür boyu pişman olacağı işe giriyorlar. İstanbul da bir mimarın öldürülmesi olayı, trafikte hemen her gün karşılaştığımız, ölümle veya yaralanma ile biten tartışmalardan sadece biridir. Bütün medyada haber olmasının sebebi, öldüren kişinin polis, öldürülen kişinin ise Türkiye\'de ve dünyada yüzlerce büyük projeye imza atan 84 yaşında ünlü bir mimar olmasıdır.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Trafikte tartışanların en çok kullandığı ifadelerden biri "Sen benim kim olduğumu biliyor musun?" şeklindedir. Bu ifadeyi kullanan insanların aşağılık kompleksine veya üstünlük kompleksine sahip olduğu bellidir. Aslında ikisi arasında pek fark yoktur. Hiç tanımadığı ve kendisinden zayıf gördüğü kişiye üstünlük taslamak, psikolojik bir bozukluğun dışavurumudur. Bunu söylemek için psikiyatri uzmanı veya psikolog olmak gerekmez ama biz yine de uzman görüşüne başvuralım...</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Memorial Hastanesi\'nin Tıbbi Yayın Kurulu tarafından hazırlanan dosyaya göre aşağılık kompleksi, ünlü psikolog Alfred Adler tarafından ortaya konulan, aşırı rekabet ve saldırganlığa kadar çeşitli davranışlara yol açabilen temel bir yetersizlik ve güvensizlik duygusudur. Genellikle kökeni çocukluk dönemine dayanan aşağılık kompleksinde çocuklar ebeveynlerinin olumsuz davranışlarına maruz kalırlar ve bu durum kişinin benlik ve karakterine zarar verir. Aşağılık kompleksi, Adler tarafından üstün olma isteğinin insanı harekete geçirmesi olarak tanımlanmış ve her insanın bu duyguları yaşadığı belirtilmiştir.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Çocukluğunda takdir edilmeyen, başka çocuklarla kıyaslanan, şiddete maruz kalan kişiler yetişkin olduklarında kendilerini sürekli olarak başkalarıyla kıyaslar. Kendilerini herkesten aşağıda gören bireyler varlıklarını ispat edebilmek için yoğun çaba harcar. Aşağılık kompleksi kişide kaygı, depresyon, özgüven eksikliği, saplantı, takıntı, asosyallik gibi sorunlara yol açabilir. Kişinin insan ilişkileri zedelenebilir ya da farkında olmadan yalnızlaşabilir. Uzman psikiyatrist veya psikolog eşliğinde uygulanacak tedavi ve kişinin kendi kişisel gelişimine gösterdiği özen ile birlikte kendini geliştirmesi aşağılık kompleksinin tedavi edilmesini sağlayabilir.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Alfred Adler\'e göre aşağılık kompleksinin tersi üstünlük kompleksidir. Üstünlük kompleksi yaşayan kişilerde benmerkezcilik görülür. Çevresindeki insanları umursamayan birey empatiden yoksundur ve kendini herkesten üstün görür. İnsan, bu komplekslerini ancak özgüvenini artıracak bir sosyal hayat and olumlu düşünce ile zararsız hale getirebilir. Yalnız doğrudan insan hayatı ile ilgili mesleklerde görev yapacak kişilerin, özgüven eğitiminden geçmesi gerekmektedir.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Diğer bir üstünlük konusu ise kendilerinin başaramadığı meslek, hayat ve hedefleri için çocuklarına baskı yapmaları and onları zorlamalarıdır. Eğitimde o kadar baskıya maruz kalıyorlar ki bilerek başarısız oluyorlar. Ebeveynler çocuklarının başarısız olduğunu görünce baskıyı azaltmak zorunda kalıyorlar. O zaman o çocuklar o kadar mutlu oluyor ki şimdi insan olduğumuzu anladık diye feryat ediyorlar.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Nevzat Tarhan’a göre de; Aşağılık duygusunun altında özgüven eksikliği yatar. Kişilerin kendini rahat, huzurlu ve başarılı hissetmeleri, istediklerini elde edebilmeleri için özgüvene sahip olmaları çok önemlidir. Özgüven eksikliği çocukluk yıllarında anne and babaların yargılayıcı, suçlayıcı, çocukta değersizlik hissi yaratan hatalı davranışlarının sonucunda ortaya çıkar. Çocuk ileri yaşlarında benliğinde yetersizlik, eksiklik and değersizlik hisseder. Çocuklar yargılanarak, eleştirilerek büyütüldüklerinde ileri yaşlarda da hep yargılanacağı kaygısı içinde olurlar. Çocuğu bu ruh durumuna sokmamak için, onun duygularını önemsemek and duygularının farkında olmak gerekir. Sırf bu yüzden psikolojik tedavi gören, hap kullanan çocukların hayatları kararıyor.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Kardeşler arasında kıyaslama daha çok okul başarısında yapılmaktadır. Bir kardeşin övülürken diğerinin sürekli eleştirilmesi şeklinde kıyaslamalar, çocukta eksiklik, yetersizlik aşağılık duyguları oluşturur. Bunun yerine çocuğa kendi içinde kıyaslama yapması öğretilmelidir. Mesela aile çocuğun okuldaki başarı seviyesinin yükselmesini istiyor ise çocuğa geleceği için neyin önemli olduğu, mutlu olmak için kendine güvenin and okul başarısının neden gerekli olduğunu anlatmalıdır. Çocuğa kendine ait hedefler koymak, bu hedeflere ulaşmasının gereğini anlatmak gerekir.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Aşağılık kompleksi olan yüzlerce amir, müdür, genel müdür, yönetim kurulu başkanı dahil bunlar yüzünden mobbinge maruz kalan, psikolojik tedavi gören and işini kaybeden insan sayısı da az değildir. Kamu personeli alımında, ehliyet and liyakate bakılmaz sadece yandaşlık esas alınırsa, bu tür vahim olayların önü alınamaz. O yüzden özellikle orta and üst düzey işe alımlarda mülakat yapılırken kişiler bir psikiyatri testinden de geçmelidir.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Yukarda da anlatıldığı gibi aşağılık kompleksi, bireyin kendisini sürekli olarak yetersiz, değersiz veya diğer insanlardan daha aşağı hissetmesi durumudur. Bu tür bir düşünce and duygusal durumun çeşitli olumsuz etkileri olabilir: Psikolojik Zararlar: Özgüven Kaybı: Sürekli yetersiz hissetmek, bireyin özgüvenini önemli ölçüde zedeler and kendi potansiyelini gerçekleştirmesini engeller. Kaygı and Depresyon: Aşağılık kompleksi, kronik kaygı and depresyon riskini artırabilir. Motivasyon Eksikliği: Birey, çaba göstermenin bir anlamı olmadığını düşünebilir, bu da hedeflerine ulaşmasını zorlaştırır. Kıskançlık and Öfke: Diğer insanlara karşı kıskançlık veya gizli bir öfke geliştirme riski taşır. Sosyal Zararlar: İzolasyon: Kendini yetersiz gören birey, başkalarından uzaklaşabilir and sosyal ortamlardan kaçınabilir. İletişim Sorunları: Diğer insanlarla sağlıklı iletişim kurmakta zorlanabilir and bu, ilişkilerde sorunlara yol açabilir. Bağımlılık: Diğer insanların onayını kazanma ihtiyacı, bağımlı ilişkilere yol açabilir. Fiziksel Zararlar: Stres Kaynaklı Hastalıklar: Sürekli stres, bağışıklık sistemi zayıflamasına, kalp hastalıklarına and diğer sağlık sorunlarına neden olabilir. Uyku Sorunları: Yetersizlik hissi, uyku bozukluklarına yol açabilir. Mesleki Zararlar: Kariyer Gelişimi Engeli: Birey, yeteneklerine güvenmediği için kariyer fırsatlarını değerlendiremeyebilir. Performans Düşüşü: İş yerinde yeterince iyi olmadığını düşünmek, verimliliği düşürebilir.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Çözüm Önerileri: -Kendi Değerini Tanımak: Güçlü yanlara odaklanmak and başarıları fark etmek önemlidir. -Profesyonel Destek: Psikolojik destek veya terapi, aşağılık kompleksinin üstesinden gelmede etkili olabilir. -Kişisel Gelişim: Yeni beceriler öğrenmek, bireyin kendine olan güvenini artırabilir.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Aşağılık kompleksi, hem bireyin hem de çevresindekilerin hayat kalitesini olumsuz etkileyebilir. Bu nedenle rahatsızlığın erken fark edilmesi and çözüm yolları aranması önemlidir. Bu hastalığı yenmenin bir çok kuralı vardır ama bir de inanç and iman yönünden de şöyle bakmak faydalı olur: “Gevşemeyin, üzülmeyin; eğer (gerçekten) iman etmişseniz en üstün olan sizlersiniz.” (Âl-i İmran 139). Târih boyunca Müslümanlar ilk defâ modernite ile birlikte, düşmanların karşılarında aşağılık karmaşıklığa (kompleksine) kapılmaktadırlar. Böylece gevşeme, îmanlarında azalma görülmekte bu durum da insanı beşerî güce meftûn and râm olmaya itmektedir. Hâlbuki modern hayat, İslâm karşısında oluşan bir karmaşıklığın ögesidir. Deizm and Ateizmin yayılmasının nedeni budur. Netsizlik and aşağılık kompleksi buna neden olmaktadır. Neticede geriye dönük kompleks sâhibi modern insan için akıl ilah olmaya, modern ideolojiler din olmaya and ideologlar da peygamber olmaya başlamaktadır. İnsanlar böylece taşlarla aynı seviyeye iner and cehennemde buluşurlar. Mü\'minlerin kompleksleri değil, îmanları vardır. O îman mü\'minlere Allah\'tan başka hiçbir şey karşısında eğilmemeyi öğretir and sağlar.</p> <!-- /wp:paragraph -->
                ',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2026/02/imagesasagilik.jpg',
                'cat'     => $catGenel->id,
                'published_at' => '2026-02-02',
            ],
            [
                'id'      => 911,
                'title'   => 'BABA YARASIMI? KALP AÇLIĞI MI, KARIN AÇLIĞI MI?',
                'excerpt' => 'Baba figürü bir çocuğun hayatında en güvenli limandır. Bu limanın eksikliği derin yaralar açabilir. Kalp açlığı mı daha ağır?',
                'content' => '
                    <!-- wp:paragraph --> <p>Gönül dağı dizisinde kalp açlığı mı? Karın açlığı mı önemli? Diye bir söz duydum. Dizi son üç bölümdür zengin bir babanın mal hırsı yüzünden çocuklarıyla hiç iletişimi olmamış ve öleceğini anlayınca ölmeden birkaç ay önce onlardan helallik isteyip hatalarını söylemesi ile baba yarasının ön plana çıktığı görüldü. Farkında olmadığımız bu önemli konuyu ilk defa dram olarak işlenmesi birçok insanda aile olmanın önemini ortaya koydu.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Geçmiş yıllarda öğrencilerime bir anket uygulardım. “iyi bir anne baba olsaydınız çocuklarınıza nasıl davranırdınız? İyi başbakan olsaydınız halka nasıl davranırdınız? İyi bir sanatçı olsaydınız nasıl bir oyuncu olurdunuz? İyi bir müdür ya da öğretmen olsaydınız öğrencilerinize nasıl davranırdınız?” gibi sorular sorardım.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Öğrencilerimin büyük çoğunluğu babasından şikâyetçi olurdu. Eve gelince televizyonun başına geçer, yatana kadar tv izler. Ama son zamanlarda da elinde telefon yatana kadar onunla meşgul oluyorlar. Bizim durumumuz nedir, başarılı mıyız, arkadaş çevremiz nedir diye merak bile etmiyorlar.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Maalesef bazı kız öğrencilerimizin arkadaş edinmesinin arkasında ilgi eksikliği yatmaktadır. Bir kız öğrencim babasına 3 sayfalık mektup yazmıştı. Babası büyük bir kurumda müdürlük yapıyor ve çevresinde sevilen biri olmasına rağmen çocuklarına hiç vakit ayırmamış. Ziyaretine gidip ön bir konuşma ile mektubu verdim. “Hocam bu adam ben miyim?” diye sordu. Maalesef bu baba sizsiniz deyince gözleri doldu ve teşekkür etti. Bir ay sonra öğrencim; “Hocam babama bir şey oldu. Benimle arkadaş gibi oldu, pastaneye, lokantaya götürüyor. Çok mutluyum” demişti.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Babaların yokluğunun etkisi halk arasında "baba sorunları" olarak bilinse de; daha teknik bir terim olan "baba yarası " olarak adlandırılır. Baba yarası, bir babanın çocuğunun hayatından fiziksel veya duygusal olarak uzak kaldığında oluşan duygusal hasara verilen addır. “Baba yarası”, babanın çocuğun duygusal gelişiminde güven, sevgi, onay veya ilgi sağlamadığı durumlarda oluşan içsel bir eksikliktir.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Küçük yaşlardan itibaren babanız tarafından sevilmediğinizi, tanınmadığınızı veya istenmediğinizi hissediyorsanız, bu durum kendinizi nasıl gördüğünüzü ve başkalarının sizde ne görmesini beklediğinizi etkileyebilir. Bu dersler yetişkinliğinizde de aklınızda kalabilir ve hayatınızı nasıl yaşayacağınızı değiştirebilir. Örneğin, kendinizde bir sorun olduğunu düşünebilirsiniz, ancak bu doğru değildir. Baba yarasının tetikleyebileceği acı ve utanç nedeniyle nadiren konuşulur. Sonuç olarak, birçok kişi baba yarasının üstesinden gelmeyi zor bulur. Ancak rehberlik, bilgi ve bir eylem planıyla baba yaranızı iyileştirmeye başlayabilirsiniz.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Baba yarası, bir kişinin babasının yokluğunda veya istismarcı olduğunda ortaya çıkan, baba ve çocuk arasında çözülememiş bir travmadır. Hem fiziksel hem de duygusal yokluğun baba yarasına yol açabileceğini bilmek önemlidir. Kadınların çocuğa bakım ve beslenme sağlaması beklenir; eğer bu duygusal desteği sağlayamazlarsa, çocukları anne yarası geliştirebilir. Ancak baba yarası, daha çok duygusal veya fiziksel devamsızlıkla ilişkilidir ve bu da babanın "koruyucu" ve "tavsiye veren" olarak klişe rolünü yansıtır. Ayrıca; baba yarası belirtileri ve bulguları kişiden kişiye farklılık gösterir ve çocukluktaki diğer duygusal zorluklara benzeyebilir. Bu nedenle, tespit edilmesi her zaman kolay değildir ve çoğu zaman fark edilmez.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Bu eksiklik yetişkinlikte şu biçimlerde ortaya çıkar: Sürekli onay ve sevgi arayışı, terk edilme korkusu. Değerini başkalarının sevgisiyle ölçme. Güçlü ya da baskın erkeklere yönelmeler olabiliyor. Yine, eşini aldatan bayanların ve erkeklerle çok gezen kızların ortak yönü kalp açlığının doyurulamamasıdır. Çocukların karnını doyurmak, onlara istedikleri her şeyi almak çözüm değildir. Baba yaraları her zaman babanın duygusal veya fiziksel yokluğunu içerir. Kızlardaki baba yarası, genellikle sağlıksız ilişkiler örüntüsüyle kendini gösterir. O yüzden kız çocukları Günebakan çekirdeğine benzetilmiştir. Evde ilgi görmeyen kız çocuklarına maalesef sokakta ayna tutan birçok yanlış insan çocukların hayatını karartıyor. Çocuklarımıza biz ayna olmalıyız.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Psikolojide “baba yarası” olan kadınların ileriki hayatlarında narsist erkekleri çekici bulması tesadüf değildir. Neden narsist erkekleri seçer? 1. Tanıdık duygudur. 2. Değerini kanıtlama ihtiyacı. 3. Kontrol yanılsaması. 4. Güç çekiciliği. Çözüm yolu ne olabilir? Baba figürüyle ilgili bastırılmış duyguları fark etmek ve üzerinde çalışmak (terapiyle mümkündür). “Sevilmek için çabalamak” yerine, kendini koşulsuz kabul etmeyi ve sağlıklı sınırlar koymayı öğrenmek. Narsist davranışları erken fark edip uzak durmak.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Peygamberimiz; “–Bağış ve ihsanlarınızla çocuklarınıza müsâvî (eşit) muâmelede bulunun. Eğer ben birini üstün tutacak olsaydım, kızları üstün tutardım.” Der. Başka bir hadiste; “Her kim üç kız çocuğunu himâye edip, büyütüp evlendirir ise, sonra da onlara lütuf ve iyilikte devam ederse o kimse cennetliktir.” Diyerek çocuklarımıza sahip olmamız gerektiğini çok güzel ifade etmiştir. “Kızını dövmeyen dizini döver” atasözü yerine “Kızını sevmeyen kendini döver” sözüyle değiştirebiliriz.</p> <!-- /wp:paragraph -->
                ',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/12/BABA.jpg',
                'cat'     => $catGenel->id,
                'published_at' => '2025-12-23',
            ],

            // ─── ANA FEED YAZILARI ────────────────────────────────────────────────
            [
                'id'      => 905,
                'title'   => 'PROBLEM GENÇLERDE Mİ? AİLELERDE Mİ?',
                'excerpt' => 'Gençlik dönemi fırtınalı bir dönemdir. Ancak bu fırtınanın kaynağı sadece gençler mi, yoksa aile içi iletişim mi?',
                'content' => '
                    <!-- wp:paragraph --> <p>"Misafirliğe gelen 3 yaşında çocuk elindeki telefonu fırlattı ve televizyonumuz kırıldı. Babası özür dilemek şöyle dursun bu kırdığı 4. telefon 2. de televizyon diye pişkin pişkin güldü." "6 yaşındaki çocuk pazar tezgahındaki dolmalık biberleri parmağıyla tek tek popit gibi deldi, pazarcı ardından ürünleri tek tek ayıklayıp kaldırmak zorunda kaldı ve annesi bir kere bile yapma demedi." "Evimize gelip tuvalete çocuğunun peşinden \"özgüveni kırılır\" diye gitmeyen anne sayesinde, çocuğun batırdığı tüm banyoyu ben temizledim." "Elinde kıyır kıyır elmalı kurabiyeyle evin içinde dolaşan çocuk için \"örtü sereyim de öyle yesin\" dedim. Annesi \"Oturup yemez ki\" diyerek omuz silkti." "Komşu çocukları bahçe aydınlatmalarını kırıyor. Söyleyince, \"Çocuğumdan daha kıymetli değil\" cevabını alıyorsun."</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Camilerde çocuklar alışsın diye teravih namazına götürülüyor, ama namaz boyu cami YouTube keşfetine dönüyor. Bu çocuk camiye mi alışıyor gerçekten? Böyle yapınca sevap kazandığını mı zannediyor bu insanlar?</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Sorun çocuklarda değil. Sorun, kitap okumayan, pedagojiden bihaber ama Instagram\'da izlediği iki videoyla kendini "çocuk ruhundan anlayan ebeveyn" ilan eden yetişkinlerde. Neymiş efendim, çocuk özgürmüş, keşfederken engellenmezmiş, hayır denmezmiş, yoksa özgüveni kırılırmış. Peki hangi psikoloji, hangi din, hangi kültür, hangi örf bu vurdumduymazlığı meşrulaştırıyor? Yeni bir akım icat ettiler: "sorunlu davranışları özgürlük sanan bir ebeveynlik" Disipline "travma", sınır koymaya "baskı" adını verdiler bir de...</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Çocuk merkezli olmak; her şeyi çocuğa bırakmak değil, onun iyiliği için sağlıklı sınırlar çizebilmektir. Özgürlük; başkasının hakkını çiğnemek değil, saygı duyarak var olabilmektir. Ebeveynlik; sadece sevmek değil, yön gösterebilmek ve sorumluluk vermektir. Çocuklarımızı özgürleştiriyoruz sanırken, aslında onları ölçüsüzlüğe teslim ediyoruz. Topluma, hayata, başkasının varlığına karşı duyarsız bireyler yetiştiriyoruz. Ama unutmayın, çocuklar her zaman öğrenir. Ya sorumluluğu, ya sorumsuzluğu... Ve çoğu zaman derslerini öğretmenlerinden değil, ebeveynlerinden alırlar. O yüzden mesele çocuk değil. Mesele aynaya bakmayı reddeden yetişkinlik. Yeteeer diye bağırmak gelmiyor mu sizin de içinizden…</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Bir de sürekli suçlanan bir gencin feryadını dinleyelim. “Ben 21 yaşında bir üniversite öğrencisiyim. Psikolog veya sözüm ona her yerde çok konuşan uzmanlar sık sık “Gençlik nereye gidiyor?” türünden yakınmalarınız oluyor? Gençlik derken herhalde lise ve üniversite öğrencilerini kastediyorsunuz. Bu durumda ben de nereye gittiğini çok merak ettiğiniz o grubun bir üyesiyim. Madem bu ülkede yaşayan insanları gençler ve yetişkinler olarak ikiye ayırdınız, ben de siz yetişkinlere bazı sorular sormak istiyorum.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Bir köşe yazarı olarak gençlerin nereye gittiğinden çok, yetişkinlerin nerede durduğuyla ilgilenmeniz gerekmiyor mu? Ülkenin başını belaya sokan olayların başaktörleri genelde gençler mi, yoksa yetişkinler mi? Bu ülkede yüz binlerce öğrenci tek bir soru fazla yapabilmek için dirsek çürütürken, birileri sınav sorularını ve sorularla birlikte gençlerin hayallerini çaldı ve geleceğimizi çürüttü. Bu soruları çalanlar lise öğrencileri miydi?</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Darbeleri planlayanlar kaçıncı sınıfa gidiyordu? Milletin yüzüne baka baka yalan söyleyen siyasetçiler hangi üniversitede okuyor? Sanatçı kimliğiyle her türlü ahlaksızlığı yapanlar ergen mi? Din adamı sıfatıyla ekranlara çıkıp inancıma ve değerlerime küfredenler kaç yaşında? Sinemada 7 yaş üstüne uygun olarak işaretlenmiş filmde bel üstüne çıkamayan yapımcılar kaç doğumlu? Lütfen artık gençliğe laf söylemeyi bırakın da yetişkinlere bakın ve “Sizler bu ülkenin geleceğisiniz!” gibi klişe sloganlardan vazgeçin. Çünkü sizler bu ülkenin bugünüsünüz. Siz yaşadığınız günü bile kurtaramazken, yarınları kurtarma işini niçin bize ihale ediyorsunuz? Kimin elinin kimin cebinde belli olmadığı, çarpık ilişkilerle dolu dizilere reyting rekoru kırdıran sizlersiniz. Kan damlayan, şiddet kusan senaryoları siz yazdırıyorsunuz. Evlilik gibi kutsal bir müesseseyi, evlilik programlarında virane bir gecekonduya dönüştüren yine sizsiniz.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Youtube fenomenlerini seyrediyoruz diye ağlaşıyorsunuz. Ama o fenomenlere film çektirip parayı götüren sizlersiniz. Siz gece kulüplerinde kavga eden futbolcuları el üstünde tutarken, okul koridorlarında kavga eden öğrencileri disipline gönderemezsiniz. Bir yandan her türlü rezilliği özgürlük olarak sunan, cinsiyetsiz bir toplum özlemiyle yanıp tutuşan yazarların kitaplarını okurken, bir yandan ailenin öneminden bahsedemezsiniz. Yetişkinler para hırsıyla sürekli inşaat yaparak şehri betona boğarken, gençlerden geleceği inşa etmelerini bekleyemezsiniz. Alttan bir sürü dersiniz var, bize üst perdeden ahlak dersi veriyorsunuz!</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Size bir şey söyleeyim mi? Yeni nesil pırıl pırıl. Hiçbir sıkıntı yok. Asıl sıkıntı, yeni nesle eski nesilleri unutturan yetişkinlerde. Son iki yılda kaç tane Türk filmi çekilmiş ve geçmişimizi anlatıyor. Kitapçıların çok satanlar rafındaki kitaplardan kaç tanesi gençlere ecdadını sevdirmek için yazılmış acaba? Siz dedelerinizin emanetine sahip çıksaydınız, biz de yarınları emanet olarak kabul ederdik belki. Ama şu durumda hiç emanet alacak durumumuz yok! Kusura bakmayın! Geçmişini unutturduğunuz bir nesle, gelecekten ödev veremezsiniz! Bu yüzden aranızda, “Yeni nesil şöyle, yeni nesil böyle!” diye konuşup durmayı bırakmalıyız! “Senin yaşında Fatih İstanbul’u fethetmişti!” diyerek demagoji de yapmayın! Evet, 21 yaşındayım. Ama Fatih’in İstanbul’u fethettiği yaşta değilim. Çünkü benim babam II. Murad değil, hocam da Akşemseddin değil. Zaten İstanbul da artık Fatih’in fethettiği İstanbul değil.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Vaktiyle evladını terbiye edemeyen bir ana, cezasını dilini kaybetmekle çeker. Örnek almamız gereken hikâye şöyledir. Üç beş yaşına gelen bir çocuk komşunun yumurtasını çalıp annesine getirir. Haram, helal bilmeyen cahil ana, yumurtayı çocuğun elinden alır ve çocuğuna bir aferin çeker ve: -Benim akıllı oğlum, aferin diyerek çocuğunun başını okşar. Çocuk, artık her gün veya gün aşırı komşuların yumurtalarını eve getirmeye başlar. Bir gün böyle, iki gün böyle derken seneler geçer. Çocuk yaşına göre hırsızlığı da ilerletir. Yumurtadan tavuğa, tavuktan horoza, horozdan koyuna, koyundan kuzuya derken bir haramzâde olur çıkar. Eski zamanın çocuğu şimdi çevresinin bir numaralı ve azılı eşkıyalarından olur. Artık bu eşkıyayı kimse durduramaz bir hale gelir. Hırsızlıklar, eşkıyalıklar derken bir gün büyük bir cinayet işler. Kanun bunun yakasına yapışıp idama mahkûm eder. Oğlunun idam haberini dinleyen ana, mahkeme salonunda feryadı basar. Saçını, başını yolar. Aman hâkim bey, biricik oğlumu bağışla, benim hayatta ondan başka kimsem yok diye yalvarır.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>İdam mahkûmu eşkıya evlada sorarlar, son bir arzun var mı? İdam mahkûmu genç: -Bir tek dileğim var. Sevgili anacığımın o mübarek dilini öpmek isterim. Mahkûmun isteği yerine getirilmek üzere annesi getirilir. Benim sevgili oğlum, dilimi son bir defa öp bakayım diyerek dilini uzatır. Eşkıya evlat, anasının dilini iki dişlerinin arasına alır. Öyle bir ısırır ki, dişler dili makas gibi keser, dil pat diye yere düşer. İdam mahkûmu genç: -Ey burada toplanan insanlar! Bilmeden boş yere konuşmayınız. Benim burada idama mahkûm oluşum o kopasıca dildendir. Ben, çocukluğumda komşumun yumurtasını çalıp getirdiğimde anam bana aferin çekti, yumurtayı alıp başımı okşadı. Eğer, o zaman beni terbiye edip men etseydi, bugün bu ölüm cezası bana gelmeyecekti der.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Çocuğumuzun yaptıklarına aferin diyen anne babalar çocuk büyüdüğünde kaderi suçlar ama kendisine toz kondurmaz. Yanlış söylenen atasözünün doğrusu şudur: “Ağaç yaş iken doğrulur” çocuk küçük yaşta iken onu doğrultmaya, düzeltmeye çalışmıyorsak elbette yanlış büyüyecektir.</p> <!-- /wp:paragraph -->
                ',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/11/Aile-Ici-Siddetin-Cocuk-Uzerindeki-Etkileri-Nasil-Azaltilabilir.jpg',
                'cat'     => $catGenel->id,
                'published_at' => '2025-11-26',
            ],
            [
                'id'      => 898,
                'title'   => 'HANGİ EĞİTİM SİSTEMİ? SOKAĞA İTEN Mİ? HAYATA BAĞLAYAN MI?',
                'excerpt' => 'Eğitim, inşa ettiği kadar imha edebilecek, geliştirdiği kadar da geriletebilecek bir güce sahiptir.',
                'content' => '
                    <!-- wp:paragraph --> <p>Eğitim, inşa ettiği kadar imha edebilecek, geliştirdiği kadar da geriletebilecek bir güce sahiptir. Bu yüzden "İyi öğretmenlik arayışımızda yeni bir ufuk açmamız gerekiyor: Bu manzarayı tam olarak çizmek için üç önemli yol izlenmeli: entelektüel, duygusal ve manevi öğretmenlik. Bunların hiçbiri göz ardı edilemez. Öğretmeyi zekaya indirgerseniz soğuk bir soyutlamaya dönüşür; duygulara indirgerseniz narsistik hale gelir, maneviyata indirgerseniz dünyayla olan bağını kaybeder. Akıl, duygu ve ruh bütünlük için birbirine bağlıdır."</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Maalesef hiçbir şey olamazsam öğretmen olurum anlayışı ile yıllardır sadece maaş için güya 3-5 soruyla mülakat yapılarak atanan ama psikoloji ve insanlık eğitimi olmayan yüzlerce öğretmen yüzünden binlerce gencin hayatı kaydı, sokaklara itildi. Yıllardan beri Bakanlık ve eğitim sendikalarına yazmama rağmen öğretmenlerin yaşadığı olumlu ve olumsuz hikayelerin kitaplaştırılarak göreve başlayan tüm öğretmenlere zorunlu okutturulması gereği inancındayım.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Öğretmen Mediha Hanım sınıfta öğrencilerine baktı, birçok öğretmenin hep yaptığı gibi hepsini aynı derecede sevdiğini söyledi. Ancak bu imkânsızdı, çünkü ön sırada oturduğu yerde bir yana kaykılmış, adı Mustafa Yılmaz olan bir erkek çocuk vardı. Mediha öğretmen, bir yıl önce Mustafa\'yı izlemiş ve diğer çocuklarla oynamadığını, elbiselerinin kirli olduğunu, sürekli olarak kirli dolaştığını gözlemlemişti. İlave olarak Mustafa tatsız da olabiliyordu.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Mediha öğretmenin okuldaki her çocuğun geçmiş kayıtlarını incelemesi gerekiyordu. Mustafa\'nın birinci sınıf öğretmeni; "Mustafa gülmeye hazır parlak bir çocuk. Ödevlerini derli toplu ve temiz yapar, çok terbiyeli." yazmıştı. İkinci sınıf öğretmeni; "Mustafa mükemmel bir öğrenci ama annesi ölümcül bir hastalığa yakalandığı için sıkıntı içinde." yazmıştı. Üçüncü sınıf öğretmeni; "Mustafa\'nın annesinin ölümü onun için çok zor oldu." yazmıştı. Dördüncü sınıf öğretmeni; "Mustafa içine kapanık ve sınıfta uyuyor." yazmıştı.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Bunları okuyan Mediha öğretmen problemi kavradı ve kendinden utandı. Doğum gününde Mustafa, kalın kahverengi bir ambalaj kâğıdı ile sarılmış, taşlarından bazıları düşmüş elmas taklidi taşlı bir bilezik ve çeyreği dolu bir parfüm şişesi getirdi. Diğer çocuklar gülerken Mediha öğretmen bileziği taktı ve parfümü sürdü. Mustafa; "Bugün tıpkı annem gibi kokuyordunuz öğretmenim.." dedi. Mediha öğretmen çocuklar gittikten sonra bir saat ağladı. O günden sonra sadece ezberletmeyi bıraktı, o yavruları eğitmeye başladı.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Yıllar geçti, Mustafa mektuplar yazmaya devam etti. Liseyi bitirdi, fakülteyi bitirdi ve en sonunda "Prof. Dr. Mustafa Yılmaz" olarak Mediha öğretmeni düğününe davet etti. Düğünde Mediha öğretmen o düşen taşlı bileziği taktı ve Mustafa\'nın annesinin parfümünü sürdü. Mustafa kulağına fısıldadı: "Bana değer verdiğiniz için teşekkür ederim.. Yine annem gibi kokuyorsunuz." Mediha öğretmen ağlayarak cevap verdi: "Mustafa\'m asıl ben sana minnettarım. Öğretmenliği bana öğreten sensin."</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Biz kendi öz eğitim sistemimize dönmediğimiz sürece başarılı olmamız mümkün değildir. 35 yıl önce ABD’nin Ankara büyükelçisi “Türkiye de başarılı olmak istiyorsanız insanların elini tutun, sırtını sıvazlayın, samimi davranın, ziyaretlerine gidin her seçimde başarılı olursunuz. Zira Anadolu insanının gönül kodları çok farklıdır” diye tespitte bulunmuş. Gerçekten öğrencinin gönlüne giren öğretmen hem çok sevilir hem de o öğrenci çok başarılı olur.</p> <!-- /wp:paragraph -->
                ',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/10/indir.jpeg',
                'cat'     => $catGenel->id,
                'published_at' => '2025-10-28',
            ],
            [
                'id'      => 893,
                'title'   => 'HATALARDAN DERS ALINMALI MI? KORKULUP KAÇILMALI MI?',
                'excerpt' => 'Süt bozulursa yoğurt olur. Yoğurt sütten daha değerlidir. Hatalar yaptığın için kötü değilsin.',
                'content' => '
                    <!-- wp:paragraph --> <p>Süt bozulursa yoğurt olur. Yoğurt sütten daha değerlidir. Daha da kötüleşirse peynir oluyor. Peynir yoğurttan da sütten de değerlidir. Ve üzüm suyu sirkeye dönüşürse üzüm suyundan daha uzun ömürlü ve faydalı olur. Hatalar yaptığın için kötü değilsin. Hatalar, seni bir insan olarak daha değerli kılan deneyimlerdir. Kristof Kolomb, Amerika\'yı keşfetmesine neden olan bir navigasyon hatası yaptı. Alexander Fleming\'in hatası onu Penisilin\'i icat etmeye yönlendirdi.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Hata yapmaktan korkmak, kişide bir davranış tarzı olarak yerleştiğinde bireyin gelişimini olumsuz etkileyen kronik bir stres kaynağıdır. Bebekler bile yürümeyi defalarca düşerek öğrenirler. Deneme-yanılma tecrübe sağlar. Hata sahiplenildiğinde bu bir zayıflık değil, aksine liderlik özelliğidir. Başarılı insan, hatasından ders alır, hata yapmaktan korkmaz.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Ticari hayatta önemli bir kural vardır: “Ya hiç kimsenin yapmadığı bir işi yapacaksınız ya da herkesin yaptığı işin en iyisini yapacaksınız”. Hayatta hiçbir şey olduğu gibi kalmaz, sürekli değişim yaşanır. Bu nedenle değişimlere karşı hazırlıklı olmak oldukça önemli. Zamanla bardağın dolu tarafını görmeyi öğrenirsiniz.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>İstişare sünnettir. Kur\'an-ı Kerim de mealen, (Yapacağın işi önce meşveret et!) buyuruluyor. (Al-i İmran 159). Bir köylü hikayesi vardır: Pamuk ekmemiş yağmur yağar diye, mısır ekmemiş hastalık gelir diye korkmuş. Sonunda hiçbir şey ekmemiş ve kendini emniyete almış! Bir çok insan da hayat tarlasına korkuları yüzünden ekim yapamıyor.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Bir Fransız yazar ”Yapılacak o kadar çok hata var ki, aynısını yapmak için hiçbir sebep yok” demiştir. Her hata iyi bir öğretmendir, yeter ki iyi bir öğrenci olalım. Kaynak: ( Niyazi F. ERES )</p> <!-- /wp:paragraph -->
                ',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/09/HATA-DERS.png',
                'cat'     => $catGenel->id,
                'published_at' => '2025-09-29',
            ],
            [
                'id'      => 886,
                'title'   => 'SOSYAL MEDYA İLE İNANILMAZ SALDIRI ALTINDAYIZ',
                'excerpt' => 'Bir gazete "İnanılmaz saldırı altındayız" diye başlık atmış. Sosyal medya düzeninden kaçışın yolları...',
                'content' => '
                    <!-- wp:paragraph --> <p>Bir gazete Ersin Çelik yazısında “İnanılmaz saldırı altındayız” diye başlık atmış. Son zamanlarda insanın anlam arayışı ve mevcut sosyal medya düzeninden kaçışın yollarına dair denemeler çok fazla görülmeye başlandı. İnternetin icadından sonra bugüne dek görülmüş en yaygın akım haline dönüşen sosyal medya, iletişimimizi kolaylaştırdığı kadar belli riskleri de beraberinde getiriyor. Farkında olarak veya olmadan yaptığınız pek çok davranış ve sahip olduğunuz alışkanlıkların sonucunda, hiç ummadığınız tehditlerle yüz yüze gelebilirsiniz.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>“Bir Başka Mesele” programında konuşan Hatice Ebrar Akbulut’un da derdi çağın insanın savrulması ve arayışları oldu. Son yazısı da “Gözetim ve Körleşme” üzerineydi ve şu tespiti çok sarsıcıydı: “İnsanı çürümüşlüğün içinde bırakan ekran, devasa bir ağın parçasıdır. Ekranda kaldıkça insan o ağın içinde yaşayan bir parazite dönüşür.” Zihnen, manen, kalben inanılmaz bir saldırı altındayız. Ekranlar üzerinden ve her bir tarafa çekiştiriliyoruz.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Bu konuda Teoman Durali Hoca da şöyle söylüyordu: “Bir buzağının, bir ineğin, bir atın, bir tayın koşuşuna, yemek yiyişine; bir güneşin doğuşuna, batışına şahitlik etmemiş bir çocuğun dünyasını neyle süsleyebiliriz?” Zihinlerimiz kirlendi ve doğal düşünemiyoruz. Oswald Spengler’in dediği gibi, bu çağın insanı dijitale angaje olmuş durumda. Akan bir nehir gördüğünde ayaklarını salındırmayı değil, onu ticari bir şeye nasıl çevireceğini hesaplıyor.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Sosyal medyada usta-çırak ilişkisi kurulamaz. Zira, sosyal medyada yalnızca bir taklit söz konusu; taklit ederek gerçek öğrenme oluşamaz. Gerçek hayatta birbirinizin soluğunu duyduğunuzda bu sizi daha anlayışlı kılar. Ama yalıtılmış bir dijital ortamda en ufak bir sese bile tahammül edemiyorsunuz. Küresel medeniyet insanı maalesef hayvanlaştırıyor. İnsan ödev ve sorumluluk bilinciyle var olur. Bu çağdaş küresel İngiliz-Yahudi medeniyeti insanı bu bilinçten koparıp atıyor.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Modern soykırımların sonu gelmeyecek diyen Cemil Meriç şöyle devam ediyor: Avrupa’nın dini bâtılları karşısında gösterdiğimiz dikkati, siyasi yalanları karşısında gösteremedik. Siyasi misyonerin muhatabı köksüz ve ufuksuz bir aydın oldu. Osmanlı, dost yapmıştı düşmanı; yeniçeri kardeşliğe yol almıştı. Avrupa kelimelerle, yalanla intelijansiyamızı büyüledi.</p> <!-- /wp:paragraph -->
                    <!-- wp:paragraph --> <p>Erol Güngör de Meriç’in izinden giderek şöyle bir değerlendirme yapıyor: "Bir şark hikâyesinde bütün tarih şu üç kelime ile hülasa edilir. Doğdular, yaşadılar, öldüler." Cemil Meriç, milli şahsiyetin iki ana unsurdan meydana geldiğini söyler: Dil ve din… Ancak sosyal medya dini de dili de yozlaştırdı. Eskiden askeri darbe yapılır, devlet 10 yıl geriye giderdi. Şimdi imanı ve dili darbelerle millet çok gerilere gider oldu.</p> <!-- /wp:paragraph -->
                ',
                'image'   => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/08/sosyal-medya.jpg',
                'cat'     => $catGenel->id,
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

        $createData = [
            'title'        => $postData['title'],
            'slug'         => $slug,
            'content'      => $postData['content'],
            'excerpt'      => $postData['excerpt'],
            'category_id'  => $postData['cat'],
            'image'        => $postData['image'],
            'is_published' => true,
        ];

        if (isset($postData['id'])) {
            $createData['id'] = $postData['id'];
        }

        Post::create($createData);
    }
}
