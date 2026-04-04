@extends('layouts.app')

@section('content')
<style>
    body { overflow-x: hidden; }
    .h2-heading { font-family: var(--font-heading); font-size: 28px; margin-bottom: 24px; color: var(--primary-color); }
</style>
<div class="container">
    <article class="single-post">
        <header class="single-post-header">
            <h1 class="page-title">Gizlilik Politikası</h1>
            <div class="single-post-meta">
                <span>Son Güncelleme: {{ date('d F Y') }}</span>
            </div>
        </header>

        <div class="single-post-content" style="max-width: 900px;">
            <p>Uğur Kantekin Blog (“biz”, “sitemiz”) olarak, ziyaretçilerimizin gizliliğine ve kişisel verilerinin korunmasına en üst düzeyde önem veriyoruz. Bu politika, sitemizi ziyaret ettiğinizde hangi verilerin toplandığını, nasıl kullanıldığını ve güvenliğinin nasıl sağlandığını açıklamaktadır.</p>

            <div style="margin-top: 60px;">
                <h2 style="font-family: var(--font-heading); font-size: 28px; margin-bottom: 24px; color: var(--primary-color);">1. Veri Sorumlusu</h2>
                <p>6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”) uyarınca, verilerinizin korunmasından site sahibi olarak Uğur Kantekin sorumludur. Kişisel verileriniz, hukuka ve dürüstlük kurallarına uygun, belirli, açık ve meşru amaçlar için işlenmektedir.</p>
            </div>

            <div style="margin-top: 40px;">
                <h2 style="font-family: var(--font-heading); font-size: 28px; margin-bottom: 24px; color: var(--primary-color);">2. Toplanan Bilgiler ve İşleme Amaçları</h2>
                <ul style="margin-bottom: 32px; list-style: disc; padding-left: 20px;">
                    <li style="margin-bottom: 16px;"><strong>İletişim Formları:</strong> İletişim sayfasındaki form üzerinden paylaştığınız ad, soyad ve e-posta adresi, yalnızca size geri dönüş yapabilmek amacıyla kullanılır.</li>
                    <li style="margin-bottom: 16px;"><strong>Kullanım Verileri:</strong> Sitemizi ziyaretiniz sırasında IP adresiniz, tarayıcı türünüz, ziyaret ettiğiniz sayfalar ve sitede geçirdiğiniz süre gibi anonim veriler, kullanıcı deneyimini iyileştirmek ve trafik analizi yapmak amacıyla (Google Analytics vb.) toplanabilir.</li>
                </ul>
            </div>

            <div style="margin-top: 40px;">
                <h2 style="font-family: var(--font-heading); font-size: 28px; margin-bottom: 24px; color: var(--primary-color);">3. Çerez Politikası</h2>
                <p>Sitemizde kullanıcı deneyimini optimize etmek için çerezler (cookies) kullanılmaktadır. Çerezler, cihazınıza kaydedilen küçük metin dosyalarıdır. Çerez kullanımını tarayıcı ayarlarınızdan dilediğiniz zaman engelleyebilir veya silebilirsiniz. Ancak çerezlerin devre dışı bırakılması, sitenin bazı özelliklerinin tam çalışmamasına neden olabilir.</p>
            </div>

            <div style="margin-top: 40px;">
                <h2 style="font-family: var(--font-heading); font-size: 28px; margin-bottom: 24px; color: var(--primary-color);">4. Verilerin Paylaşımı</h2>
                <p>Topladığımız kişisel veriler, kanuni yükümlülüklerimizin gerektirdiği durumlar haricinde hiçbir şekilde üçüncü şahıslara satılmaz, kiralanmaz veya ticari amaçla paylaşılmaz.</p>
            </div>

            <div style="margin-top: 40px;">
                <h2 style="font-family: var(--font-heading); font-size: 28px; margin-bottom: 24px; color: var(--primary-color);">5. Haklarınız</h2>
                <p>KVKK kapsamında verilerinizin işlenip işlenmediğini öğrenme, yanlış işlenmişse düzeltilmesini isteme veya verilerinizin silinmesini talep etme hakkına sahipsiniz. Sorularınız ve talepleriniz için bizimle <a href="{{ route('contact') }}" style="color: var(--accent-color); font-weight: 600; border-bottom: 1px solid var(--accent-color);">iletişim sayfası</a> üzerinden irtibata geçebilirsiniz.</p>
            </div>

            <div style="margin-top: 80px; padding: 40px; background: var(--section-bg); border-radius: 8px; text-align: center;">
                <p style="font-style: italic; color: var(--text-muted); margin-bottom: 0;">Bu Gizlilik Politikası, sitemizde yapılan güncellemeler doğrultusunda zaman zaman revize edilebilir.</p>
            </div>
        </div>
    </article>
</div>
@endsection
