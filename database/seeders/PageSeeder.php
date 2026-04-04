<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Page::updateOrCreate(
            ['slug' => 'hakkimda'],
            [
                'title' => 'Hakkımda',
                'image' => 'images/profile.jpg',
                'content' => json_encode([
                    'intro_quote' => 'Merhaba, düşünceler duyguları, duygular düşünceleri doğurur... Alışkanlıklarımız da nihayetinde kişiliğimizi oluşturur.',
                    'bio_1' => 'Düşünceler davranışları, davranışlar inançları, inançlar da alışkanlıkları doğurur. Alışkanlıklarımız da kişiliğimizi oluşturur. Bugüne kadar kişilik özelliklerinin okumaya etkisi üzerinde pek durulmamıştır. Kişilikten kaynaklanan zafiyetler kişinin daha fazla ve hızlı okumasını mutlak surette etkiler. Bunları değiştirmek temel hayat görüşlerini değiştirmek kadar zordur.',
                    'middle_quote' => 'Ne kadar okuduğumuzdan çok ne kadar anladığımız önemli. Anlama becerimiz okuma hızınızı, okuma becerinizse anlama oranımızı etkiler ve geliştirir.',
                    'bio_2' => 'Okuyarak olayların ve gelişmelerin iç yüzünü öğrenen bir kişi, öncelikle kendine olan güvenini artırır. Ayrıca okuyan kişiler çok okumanın beraberinde getirdiği zengin kelime dağarcığına sahip oldukları için, hikmetli ve etkileyici konuşarak çevrelerinde büyük bir etki uyandırırlar.',
                    'section_2_title' => 'Yazmanın Gücü',
                    'section_2_text' => 'Yazmanın gelişimsel faydası geri dönülebilir olmasının zihne katkısı olmasıdır. Yazı bütünseldir. Yazma eylemi bir arayıştır, bir sözcükte durursunuz, başka bir sözcük tercihi bile konuşma altyapısına katkı sunar. Yazmak insanın kendi iç yolculuğudur ki bu yolculuk zihni zorlar, zorlanan zihin gelişir.',
                    'section_3_title' => 'Yazarlık Serüvenim',
                    'section_3_text' => 'Lise yıllarında başlayan not tutma alışkanlığı üniversitede de devam etti. Arkadaşlarım 60 sayfalık yerden ders çalışırken ben 10 sayfaya çıkardığım özetlerle sınava girerdim. 1993 yılından itibaren yerel gazetelerde ve dergilerde sürekli yazmaya başladım. Yazılarımı daha çok insanın okuması için teknik desteklerle bu site kendiliğinden oluştu.',
                    'footer_title' => 'TEŞEKKÜRLERİMLE',
                    'footer_text' => 'Bana destek veren Hasan Lök hocama, Yaşar Diken beye, teknik destek veren Ali Bozoğlan beye, sabırla yanımda olan eşim Gül hanıma, imla ve anlam kazanmak için yardım eden kızım Aybüke Sena\'ya ve manevi büyüğümüz rahmetli Ahmet Bozoğlan efendiye teşekkürlerimi borç bilirim.'
                ])
            ]
        );
    }
}
