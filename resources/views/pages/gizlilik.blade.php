@extends('layouts.app')

@section('content')
    <article class="card visible" style="transform: none; opacity: 1;">
        <header class="article-header">
            <h1 class="article-title">Gizlilik Politikası</h1>
        </header>
        
        <div class="post-body">
            <p>Uğur Kantekin Blog olarak, sitemizi ziyaret eden kullanıcılarımızın gizliliğine önem veriyoruz.</p>
            
            <h3>1. Toplanan Bilgiler</h3>
            <p>Sitemizi ziyaret ettiğinizde, analiz amaçlı olarak (Google Analytics vb. araçlar vasıtasıyla) anonim veriler toplanabilir. Bunlar, IP adresiniz, tarayıcı türünüz, ziyaret ettiğiniz sayfalar ve sitede geçirdiğiniz süre gibi standart internet günlüğü verileridir.</p>
            
            <h3>2. Çerezler (Cookies)</h3>
            <p>Sitemiz, kullanıcı deneyimini geliştirmek amacıyla çerezler kullanmaktadır. Tarayıcınızın ayarlarından çerezleri devre dışı bırakmayı tercih edebilirsiniz.</p>
            
            <h3>3. Üçüncü Taraf Bağlantıları</h3>
            <p>Sitemizde başka web sitelerine bağlantılar bulunabilir. Bu sitelerin gizlilik uygulamalarından veya içeriklerinden sorumlu değiliz.</p>
            
            <p style="margin-top: 40px; font-size: 0.9em; color: var(--text-secondary);">Son Güncelleme: {{ date('d.m.Y') }}</p>
        </div>
    </article>
@endsection
