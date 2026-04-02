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
        $category = Category::firstOrCreate(['name' => 'Genel Yaz─▒lar'], ['slug' => 'genel-yazilar']);

        $posts = [
            [
                'title' => 'A┼ŞA─ŞILIK KOMPLEKS─░ ─░NSAN D├ûVMEYE VE ├ûLD├£RMEYE NEDEN OLUR MU?',
                'excerpt' => 'A┼şa─ş─▒l─▒k kompleksi, bireyin kendini ba┼şkalar─▒ndan yetersiz hissetmesi durumudur. Bu his bazen sald─▒rganl─▒─şa yol a├ğabilir...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2026/02/imagesasagilik.jpg'
            ],
            [
                'title' => 'BABA YARASIMI? KALP A├çLI─ŞI MI, KARIN A├çLI─ŞI MI?',
                'excerpt' => 'Baba fig├╝r├╝ bir ├ğocu─şun hayat─▒nda en g├╝venli limand─▒r. Bu liman─▒n eksikli─şi derin yaralar a├ğabilir...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/12/BABA.jpg'
            ],
            [
                'title' => 'PROBLEM GEN├çLERDE M─░? A─░LELERDE M─░?',
                'excerpt' => 'Gen├ğlik d├Ânemi f─▒rt─▒nal─▒ bir d├Ânemdir. Ancak bu f─▒rt─▒nan─▒n kayna─ş─▒ sadece gen├ğler mi, yoksa aile i├ği ileti┼şim mi?',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2025/11/Aile-Ici-Siddetin-Cocuk-Uzerindeki-Etkileri-Nasil-Azaltilabilir.jpg'
            ],
            [
                'title' => 'DEPRESYONLUMUYUZ?',
                'excerpt' => 'Herkes zaman zaman kendini de─şersiz ve yetersiz g├Ârebilir veya k├Ât├╝ hissedebilir. Bu bir su├ğ ve zay─▒fl─▒k de─şildir...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/depresyon-2-1020x600.jpg'
            ],
            [
                'title' => 'DEPRESYON ─░LA├çLARI KULLANILMALI MI?',
                'excerpt' => 'G├╝n├╝m├╝zde herkes rahat olmad─▒─ş─▒ndan ┼şik├óyet├ği olur ama hi├ğ kimsede rahatl─▒kla ilgili yap─▒lmas─▒ gerekenleri ara┼şt─▒rmaz...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/depresyon-1020x600.jpg'
            ],
            [
                'title' => 'DE─ŞER VERME VE DE─ŞERS─░ZL─░K H─░SS─░',
                'excerpt' => 'E─şitimci yazar Ali┼şan Kapakl─▒kaya kitab─▒nda anlat─▒yor: 2010 y─▒l─▒nda ┼Şanl─▒urfaÔÇÖya konferans i├ğin gittim...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/degersizlik.jpg'
            ],
            [
                'title' => '├ç├ûP KAMYONU TEOR─░S─░',
                'excerpt' => 'Kad─▒n taksiye binmi┼ş ve hava alan─▒na gitmek istedi─şini s├Âylemi┼şti. Sa─ş ┼şeritte yol al─▒rken siyah bir araba...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cop-700x600.jpeg'
            ],
            [
                'title' => '├çOCUKLARIMIZA ├ûZEN G├ûSTEREL─░M',
                'excerpt' => 'Okullar─▒n a├ğ─▒lmas─▒ ile birlikte ilk haftalarda tan─▒┼şma fasl─▒ ile ba┼şlayan konu┼şmalarda bir├ğok ├Â─şrencinin...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cocuga-ozen.jpg'
            ],
            [
                'title' => '├çOCUK YET─░┼ŞT─░RMEDE DENGE',
                'excerpt' => 'Genellikle her insan, ebeveyn oldu─şunda ├ğocuklar─▒ ├╝zerinden yeni bir hik├óye yazmaya ba┼şl─▒yor...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cocuk-yetistirme-e1554230003496.jpg'
            ],
            [
                'title' => '├çOCU─ŞA PARA KAVRAMI NE ZAMAN ├û─ŞRET─░LMEL─░?',
                'excerpt' => 'Maa┼şlar m─▒ yetmiyor? T├╝ketim k├╝lt├╝r├╝ n├╝m├╝ bilmiyoruz. Marketlerde, oyuncak├ğ─▒larda AVMÔÇÖlerde...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/para-cocuk-1-.jpg'
            ],
            [
                'title' => '├ç─░TLER─░N ─░├ç─░NDEK─░ DAR VE GEN─░┼Ş D├£NYALARÔÇĞ',
                'excerpt' => 'U├ğsuz bucaks─▒z bir ├ğimenlik alan d├╝┼ş├╝n├╝n. Bu ├ğimenli─şin ├╝st├╝nde bir aile, bir ├ğit ├ğekiyor ve...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/citler.jpeg'
            ],
            [
                'title' => '├çEKT─░KLER─░M─░Z HEP KEND─░ EL─░M─░ZDEN M─░?',
                'excerpt' => 'Ellerimizle ├╝rettiklerimizin sonu├ğlar─▒n─▒ ya┼şar─▒z daima. Buradaki ÔÇ£ellerÔÇØ tabirini sadece fiillerimizin...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/SARMISAK.jpg'
            ],
            [
                'title' => 'CESARET',
                'excerpt' => '─░┼şe yeni ba┼şlayan bir├ğok ki┼şi o g├╝n├╝n bitiminde sevinerek evlerine d├Ânerler ve soranlara...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cesaret.jpg'
            ],
            [
                'title' => 'CENNET KOKULU ELMALAR',
                'excerpt' => 'Ya┼şl─▒ bir ├ğift ├ğocuklar─▒n─▒ evlendirmi┼şler ve bir k├Âyde Allah i├ğin birbirlerine sayg─▒ ve sevgi i├ğinde...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/cennet-kokulu-elma.jpg'
            ],
            [
                'title' => 'CANIMIZ, DUA SEB─░L─░M─░Z, ANALARIMIZÔÇĞ',
                'excerpt' => 'Derste bir ├Â─şrencim ÔÇ£Hocam dergiye bu ay yaz─▒ yazd─▒n─▒z m─▒ÔÇØ dedi. ÔÇ£┼Şu an haz─▒rl─▒yorum...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/dua-sebili-anneler.jpg'
            ],
            [
                'title' => 'BO┼ŞANMALARI ├ûNLEYEL─░MÔÇĞÔÇĞ',
                'excerpt' => 'T├╝rkiye ─░statistik Kurumu taraf─▒ndan 2007 y─▒l─▒ndan itibaren y─▒ll─▒k yay─▒mlanan evlenme ve bo┼şanma...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/kirik-kalp-1020x600.jpg'
            ],
            [
                'title' => '─░K─░ KALBE MUKAB─░L B─░R KALP',
                'excerpt' => 'Her insan hayat─▒n─▒n kar┼ş─▒l─▒─ş─▒n─▒, kalbinin e┼şini, ruh ikizini arar durur. Bulabilen insan hayattan...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/iki-kalbe-bir-kalp.jpg'
            ],
            [
                'title' => 'B─░L─░N├çALTINI Y├ûNETMEK',
                'excerpt' => 'Beyin, ├ğok y├Ânl├╝ bir kontrol merkezidir. Beyin, b├╝t├╝n v├╝cut sistemlerini y├Ânetir ve aralar─▒nda i┼şbirli─şi sa─şlar...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/01/akil.jpg'
            ],
            [
                'title' => 'B─░L─░N├çALTI',
                'excerpt' => 'Bilin├ğalt─▒ ├ğo─şumuzun bildi─şi ya da duydu─şu bir kavramd─▒r. Bu kavram bilincimizin fark─▒nda olmad─▒─ş─▒...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/bilincalti-900x600.jpg'
            ],
            [
                'title' => 'B─░LG─░ VE SEVG─░N─░N B─░RLE┼Ş─░M─░; ─░NSAN KAYNAKLARI',
                'excerpt' => 'Y├Ânetimde disiplinsizli─şin nedeni b├╝y├╝k ├Âl├ğ├╝de y├Âneticidir, daha do─şrusu y├Âneticinin y├Ânetim sistemidir...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/insan-kaynaklari.jpg'
            ],
            [
                'title' => 'SEVG─░ÔÇĞ B─░LD─░─Ş─░M─░Z G─░B─░ M─░?',
                'excerpt' => 'Japonya\'da ya┼şanm─▒┼ş ger├ğek bir olay ┼ş├Âyledir: Evini yeniden dekore ettirmek isteyen Japon...',
                'image' => 'https://www.ugurkantekin.com.tr/wp-content/uploads/2023/02/sevgi-bildigimiz-1020x600.jpg'
            ],
        ];

        foreach ($posts as $postData) {
            Post::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'content' => $postData['excerpt'] . "\n\nBu yaz─▒ ├Ârnek olarak eklenmi┼ştir. Tam i├ğeri─şi admin panelinden g├╝ncelleyebilirsiniz.",
                'excerpt' => $postData['excerpt'],
                'category_id' => $category->id,
                'image' => $postData['image'], // Storing full URL for now
                'is_published' => true
            ]);
        }
    }
}
