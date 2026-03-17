@extends('layouts.app')

@section('content')
    <style>
        .about-page {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
        }

        .breadcrumb {
            margin-bottom: 40px;
            font-size: 13px;
            color: #888;
            font-family: 'Montserrat', sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: fadeInDown 0.8s ease-out;
        }

        .breadcrumb a { color: var(--accent); }

        /* Fancy Header Section */
        .person-header {
            position: relative;
            margin-bottom: 60px;
            animation: fadeInUp 1s ease-out;
        }

        .person-img-wrapper {
            position: relative;
            width: 100%;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
            margin-bottom: 40px;
        }

        .person-img-wrapper img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 1.5s ease;
        }

        .person-img-wrapper:hover img {
            transform: scale(1.05);
        }

        .person-name-card {
            position: absolute;
            bottom: -30px;
            right: 40px;
            background: white;
            padding: 30px 50px;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            z-index: 10;
            text-align: right;
            border-left: 4px solid var(--accent);
            animation: slideInRight 1.2s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .person-name-card h1 {
            font-size: 28px;
            margin: 0;
            color: #1a202c;
            letter-spacing: 2px;
        }

        .person-name-card p {
            margin: 5px 0 0 0;
            font-size: 14px;
            color: var(--accent);
            font-weight: 600;
            letter-spacing: 4px;
            text-transform: uppercase;
        }

        /* Content Sections */
        .about-intro {
            font-size: 24px;
            color: #1a202c;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 40px;
            line-height: 1.4;
            font-weight: 300;
            border-left: 2px solid var(--accent);
            padding-left: 30px;
            animation: fadeInLeft 1s ease-out 0.5s both;
        }

        .content-grid {
            display: grid;
            gap: 40px;
            animation: fadeInUp 1s ease-out 0.8s both;
        }

        .content-block {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            border: 1px solid rgba(0,0,0,0.02);
            transition: transform 0.3s ease;
        }

        .content-block:hover {
            transform: translateY(-5px);
        }

        .content-block p {
            margin-bottom: 25px;
            color: #4a5568;
            font-size: 17px;
            line-height: 1.9;
        }

        .content-block p:last-child { margin-bottom: 0; }

        .quote-block {
            background: var(--bg-color);
            padding: 40px;
            border-radius: 20px;
            position: relative;
            margin: 30px 0;
            font-style: italic;
            color: #2d3748;
            font-size: 19px;
            line-height: 1.7;
            text-align: center;
        }

        .quote-block::before {
            content: '"';
            position: absolute;
            top: 20px;
            left: 30px;
            font-size: 80px;
            color: var(--accent);
            opacity: 0.2;
            font-family: serif;
        }

        .thanks-section {
            margin-top: 60px;
            padding: 50px;
            background: #1a202c;
            color: white;
            border-radius: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .thanks-section h3 {
            color: var(--accent);
            font-size: 22px;
            margin-bottom: 30px;
            letter-spacing: 5px;
        }

        .thanks-section p {
            color: #a0aec0;
            line-height: 2;
            font-size: 15px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-40px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(100px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Mobile Adjustments */
        @media (max-width: 768px) {
            .person-name-card {
                position: static;
                margin-top: -50px;
                margin-left: 20px;
                margin-right: 20px;
                padding: 20px;
                text-align: center;
                border-left: none;
                border-top: 4px solid var(--accent);
            }
            .person-header { margin-bottom: 40px; }
            .about-intro { font-size: 20px; }
            .content-block { padding: 25px; }
            .thanks-section { padding: 30px 20px; }
        }
    </style>

    <div class="about-page">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Ana sayfa</a> / Hakkımda
        </div>

        <div class="person-header">
            <div class="person-img-wrapper">
                <img src="https://www.ugurkantekin.com.tr/wp-content/uploads/2023/03/DSC_0027-1024x683.jpg" alt="Uğur Kantekin">
            </div>
            <div class="person-name-card">
                <h1>UĞUR KANTEKİN</h1>
            </div>
        </div>

        <div class="about-intro">
            "Merhaba, düşünceler duyguları, duygular düşünceleri doğurur..."
        </div>

        <div class="content-grid">
            <div class="content-block">
                <p>Düşünceler davranışları, davranışlar inançları, inançlar da alışkanlıkları doğurur. Alışkanlıklarımız da kişiliğimizi oluşturur. Bugüne kadar kişilik özelliklerinin okumaya etkisi üzerinde pek durulmamıştır. Kişilikten kaynaklanan zafiyetler kişinin daha fazla ve hızlı okumasını mutlak surette etkiler. Bunları değiştirmek temel hayat görüşlerini değiştirmek kadar zordur.</p>
                
                <div class="quote-block">
                    "Ne kadar okuduğumuzdan çok ne kadar anladığımız önemli. Anlama becerimiz okuma hızınızı, okuma becerinizse anlama oranımızı etkiler ve geliştirir."
                </div>

                <p>Okuyarak olayların ve gelişmelerin iç yüzünü öğrenen bir kişi, öncelikle kendine olan güvenini artırır. Ayrıca okuyan kişiler çok okumanın beraberinde getirdiği zengin kelime dağarcığına sahip oldukları için, hikmetli ve etkileyici konuşarak çevrelerinde büyük bir etki uyandırırlar.</p>
            </div>

            <div class="content-block" style="border-right: 4px solid var(--accent); border-left: none;">
                <h3 style="margin-bottom: 20px; letter-spacing: 2px;">YAZMANIN GÜCÜ</h3>
                <p>Yazmanın gelişimsel faydası geri dönülebilir olmasının zihne katkısı olmasıdır. Yazı bütünseldir. Yazma eylemi bir arayıştır, bir sözcükte durursunuz, başka bir sözcük tercihi bile konuşma altyapısına katkı sunar. Yazmak insanın kendi iç yolculuğudur ki bu yolculuk zihni zorlar, zorlanan zihin gelişir.</p>
            </div>

            <div class="content-block">
                <h3 style="margin-bottom: 20px; letter-spacing: 2px;">YAZARLIK SERÜVENİ</h3>
                <p>Lise yıllarında başlayan not tutma alışkanlığı üniversitede de devam etti. Arkadaşlarım 60 sayfalık yerden ders çalışırken ben 10 sayfaya çıkardığım özetlerle sınava girerdim. 1993 yılından itibaren yerel gazetelerde ve dergilerde sürekli yazmaya başladım. Yazılarımı daha çok insanın okuması için teknik desteklerle bu site kendiliğinden oluştu.</p>
            </div>
        </div>

        <div class="thanks-section">
            <i class="fas fa-heart" style="color: var(--accent); font-size: 30px; margin-bottom: 20px; display: block;"></i>
            <h3>TEŞEKKÜRLERİMLE</h3>
            <p>Bana destek veren Hasan Lök hocama, Yaşar Diken beye, teknik destek veren Ali Bozoğlan beye, sabırla yanımda olan eşim Gül hanıma, imla ve anlam kazanmak için yardım eden kızım Aybüke Sena'ya ve manevi büyüğümüz rahmetli Ahmet Bozoğlan efendiye teşekkürlerimi borç bilirim.</p>
        </div>
    </div>
@endsection
