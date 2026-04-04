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
                'content' => '
                    <p style="font-size: 24px; font-family: \'Playfair Display\', serif; font-style: italic; color: #1a1a1a; line-height: 1.6; margin-bottom: 48px; border-left: 4px solid #c2a35d; padding-left: 32px;">
                        "İnsan, ancak manevi bir derinlik ve samimiyetle kendini bulabilir. Kalemimle, bu içsel yolculukta sizlere eşlik etmeye gayret ediyorum."
                    </p>

                    <p>1993 yılından bu yana yerel gazetelerde ve çeşitli mecralarda kaleme aldığım yazılarla, toplumsal değerlerimizi, aile içi iletişimi ve insanın anlam arayışını merkezime aldım. Eğitimcilik kimliğimle birleşen bu yazma serüveni, zamanla "Huzur Kalpte Başlar" mottosuyla bütünleşen bu dijital platformun doğmasına vesile oldu.</p>

                    <div style="margin: 60px 0; padding: 40px; background: #fdfdfd; border: 1px solid #f0f0f0; border-radius: 8px; text-align: center; position: relative; box-shadow: var(--shadow-sm);">
                        <i class="fas fa-feather-alt" style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 32px; color: #c2a35d; background: white; padding: 10px; border-radius: 50%;"></i>
                        <p style="font-family: \'Playfair Display\', serif; font-size: 20px; font-style: italic; color: #1a1a1a; margin-bottom: 0; line-height: 1.8;">
                            "Okumak bir keşfediş, yazmak ise bir arayıştır. Her kelime, ruhun derinliklerinden süzülen birer fısıltıdır."
                        </p>
                    </div>

                    <h2 style="font-family: \'Playfair Display\', serif; font-size: 32px; margin: 60px 0 24px; color: #1a1a1a;">Eğitim ve Toplum</h2>
                    <p>Geleceğin inşasında en büyük payın eğitime ve sağlam bir aile yapısına ait olduğuna inanıyorum. Yazılarımda modern dünyanın getirdiği "ekran bağımlılığı" ve "mekansızlaşma" gibi sorunlara değinirken, çözümün yine kendi öz değerlerimizde ve "gönül kodlarımızda" saklı olduğunu hatırlatmaya çalışıyorum.</p>

                    <h2 style="font-family: \'Playfair Display\', serif; font-size: 32px; margin: 60px 0 24px; color: #1a1a1a;">Yolculuğumuz</h2>
                    <p>Bu site, sadece bir arşiv değil; bir dertleşme ve ortak bir akıl platformudur. Çocuk yetiştirmeden kişisel gelişime, dini bilgilerden sosyal hayat eleştirilerine kadar geniş bir yelpazede paylaştığım düşüncelerimle, daha farkında ve huzurlu bir yaşam sürdürmenize katkı sağlamayı amaçlıyorum.</p>

                    <div style="margin-top: 100px; padding-top: 60px; border-top: 1px solid #eeeeee; text-align: center;">
                        <h3 style="font-family: \'Playfair Display\', serif; font-size: 20px; margin-bottom: 32px; letter-spacing: 3px; color: #c2a35d; font-weight: 700;">TEŞEKKÜRLERİMLE</h3>
                        <p style="font-size: 15px; color: #666; line-height: 2; max-width: 600px; margin: 0 auto;">
                            Desteğini esirgemeyen tüm dostlarıma, bu yolculukta bana ilham veren büyüklerime ve her daim yanımda olan aileme şükranlarımı borç bilirim.
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
