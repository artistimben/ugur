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
                'image' => 'images/hakkimda.jpg',
                'content' => '
                    <p style="font-size: 24px; font-family: \'Playfair Display\', serif; font-style: italic; color: #1a1a1a; line-height: 1.5; margin-bottom: 48px; border-left: 3px solid #c2a35d; padding-left: 32px;">
                        "Merhaba, düşünceler duyguları, duygular düşünceleri doğurur... Alışkanlıklarımız da nihayetinde kişiliğimizi oluşturur."
                    </p>

                    <p>Düşünceler davranışları, davranışlar inançları, inançlar da alışkanlıkları doğurur. Alışkanlıklarımız da kişiliğimizi oluşturur. Bugüne kadar kişilik özelliklerinin okumaya etkisi üzerinde pek durulmamıştır. Kişilikten kaynaklanan zafiyetler kişinin daha fazla ve hızlı okumasını mutlak surette etkiler. Bunları değiştirmek temel hayat görüşlerini değiştirmek kadar zordur.</p>

                    <div style="margin: 60px 0; padding: 40px; background: #f9f9f9; border-radius: 4px; text-align: center; position: relative;">
                        <i class="fas fa-quote-left" style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 40px; color: #c2a35d; background: white; padding: 10px;"></i>
                        <p style="font-family: \'Playfair Display\', serif; font-size: 22px; font-style: italic; color: #1a1a1a; margin-bottom: 0;">
                            "Ne kadar okuduğumuzdan çok ne kadar anladığımız önemli. Anlama becerimiz okuma hızınızı, okuma becerinizse anlama oranımızı etkiler ve geliştirir."
                        </p>
                    </div>

                    <p>Okuyarak olayların ve gelişmelerin iç yüzünü öğrenen bir kişi, öncelikle kendine olan güvenini artırır. Ayrıca okuyan kişiler çok okumanın beraberinde getirdiği zengin kelime dağarcığına sahip oldukları için, hikmetli ve etkileyici konuşarak çevrelerinde büyük bir etki uyandırırlar.</p>

                    <h2 style="font-family: \'Playfair Display\', serif; font-size: 32px; margin: 60px 0 24px; color: #1a1a1a;">Yazmanın Gücü</h2>
                    <p>Yazmanın gelişimsel faydası geri dönülebilir olmasının zihne katkısı olmasıdır. Yazı bütünseldir. Yazma eylemi bir arayıştır, bir sözcükte durursunuz, başka bir sözcük tercihi bile konuşma altyapısına katkı sunar. Yazmak insanın kendi iç yolculuğudur ki bu yolculuk zihni zorlar, zorlanan zihin gelişir.</p>

                    <h2 style="font-family: \'Playfair Display\', serif; font-size: 32px; margin: 60px 0 24px; color: #1a1a1a;">Yazarlık Serüvenim</h2>
                    <p>Lise yıllarında başlayan not tutma alışkanlığı üniversitede de devam etti. Arkadaşlarım 60 sayfalık yerden ders çalışırken ben 10 sayfaya çıkardığım özetlerle sınava girerdim. 1993 yılından itibaren yerel gazetelerde ve dergilerde sürekli yazmaya başladım. Yazılarımı daha çok insanın okuması için teknik desteklerle bu site kendiliğinden oluştu.</p>

                    <div style="margin-top: 100px; padding-top: 60px; border-top: 1px solid #eeeeee; text-align: center;">
                        <h3 style="font-family: \'Playfair Display\', serif; font-size: 24px; margin-bottom: 32px; letter-spacing: 2px; color: #c2a35d;">TEŞEKKÜRLERİMLE</h3>
                        <p style="font-size: 15px; color: #666; line-height: 2;">
                            Bana destek veren Hasan Lök hocama, Yaşar Diken beye, teknik destek veren Ali Bozoğlan beye, sabırla yanımda olan eşim Gül hanıma, imla ve anlam kazanmak için yardım eden kızım Aybüke Sena\'ya ve manevi büyüğümüz rahmetli Ahmet Bozoğlan efendiye teşekkürlerimi borç bilirim.
                        </p>
                        <div style="margin-top: 40px; color: #c2a35d;">
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                '
            ]
        );
    }
}
