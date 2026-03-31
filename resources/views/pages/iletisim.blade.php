@extends('layouts.app')

@section('content')
<style>
/* ─── CONTACT PAGE ÖZEL STİLLERİ ─── */
.contact-page-wrapper {
    max-width: 1100px;
    margin: 80px auto 100px;
    padding: 0 24px;
}

.contact-header {
    text-align: center;
    margin-bottom: 60px;
}

.contact-header h1 {
    font-family: var(--font-heading);
    font-size: 46px;
    color: var(--primary-color);
    margin-bottom: 20px;
    font-weight: 700;
}

.contact-header p {
    font-size: 16px;
    color: var(--text-muted);
    max-width: 650px;
    margin: 0 auto;
    line-height: 1.8;
}

.contact-grid {
    display: grid;
    grid-template-columns: 3fr 2fr;
    gap: 50px;
    align-items: start;
}

/* Form Kısmı */
.modern-contact-form {
    background: #fff;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.04);
}

.modern-contact-form h3 {
    font-family: var(--font-heading);
    font-size: 24px;
    margin-bottom: 30px;
    color: var(--primary-color);
}

.modern-contact-form .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.modern-contact-form .form-group {
    margin-bottom: 24px;
}

.modern-contact-form label {
    display: block;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-weight: 700;
    color: var(--text-muted);
    margin-bottom: 10px;
}

.modern-contact-form input,
.modern-contact-form textarea {
    width: 100%;
    padding: 16px 20px;
    border: 1.5px solid var(--border-color);
    border-radius: 10px;
    font-family: inherit;
    font-size: 14px;
    color: var(--text-color);
    transition: var(--transition);
    background: var(--section-bg);
}

.modern-contact-form input:focus,
.modern-contact-form textarea:focus {
    outline: none;
    border-color: var(--accent-color);
    background: #fff;
    box-shadow: 0 0 0 4px rgba(194, 163, 93, 0.1);
}

.contact-submit-btn {
    background: var(--primary-color);
    color: #fff;
    border: none;
    padding: 18px 32px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    cursor: pointer;
    width: 100%;
    transition: var(--transition);
}

.contact-submit-btn:hover {
    background: var(--accent-color);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(194, 163, 93, 0.3);
}

/* Bilgi Kartları Kısmı */
.contact-info-section {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.info-card {
    display: flex;
    align-items: center;
    gap: 20px;
    background: #fff;
    padding: 24px 30px;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    transition: var(--transition);
    border: 1.5px solid transparent;
}

.info-card:hover {
    transform: translateY(-3px);
    border-color: var(--accent-color);
    box-shadow: 0 10px 30px rgba(194, 163, 93, 0.1);
}

.info-icon {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: rgba(194, 163, 93, 0.1);
    color: var(--accent-color);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
}

.info-text h4 {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    color: var(--text-muted);
    margin-bottom: 6px;
    font-weight: 700;
}

.info-text p {
    font-family: var(--font-heading);
    font-size: 18px;
    font-weight: 700;
}

.info-text a {
    color: var(--primary-color);
    transition: var(--transition);
    text-decoration: none;
}

.info-card:hover .info-text a {
    color: var(--accent-color);
}

/* Özel WhatsApp Kartı Tasarımı */
.whatsapp-card {
    background: linear-gradient(135deg, #fff 0%, #f0fff4 100%);
    border-color: rgba(37, 211, 102, 0.2);
}

.whatsapp-card .info-icon {
    background: #25D366;
    color: #fff;
    box-shadow: 0 6px 15px rgba(37, 211, 102, 0.3);
}

.whatsapp-card:hover {
    border-color: #25D366;
    box-shadow: 0 12px 30px rgba(37, 211, 102, 0.2);
}

.whatsapp-card:hover .info-text a {
    color: #128C7E;
}

/* Sosyal Medya */
.social-links-card {
    margin-top: 10px;
    padding: 30px;
    background: var(--section-bg);
    border-radius: 16px;
    text-align: center;
    border: 1.5px dashed var(--border-color);
}

.social-links-card h4 {
    font-size: 15px;
    font-family: var(--font-heading);
    margin-bottom: 24px;
    color: var(--primary-color);
}

.social-icons {
    display: flex;
    justify-content: center;
    gap: 16px;
}

.social-icons a {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #fff;
    color: var(--primary-color);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.social-icons a:hover {
    background: var(--accent-color);
    color: #fff;
    transform: translateY(-4px);
    box-shadow: 0 10px 20px rgba(194, 163, 93, 0.4);
}

/* Mobil Uyumluluk */
@media (max-width: 900px) {
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    .contact-header h1 {
        font-size: 36px;
    }
}
@media (max-width: 600px) {
    .modern-contact-form .form-row {
        grid-template-columns: 1fr;
    }
    .modern-contact-form {
        padding: 30px 20px;
    }
    .info-card {
        padding: 20px;
    }
}
</style>

<div class="contact-page-wrapper">
    <div class="contact-header">
        <h1>Birlikte İlerleyelim</h1>
        <p>Görüş, öneri ve düşüncelerinizi dinlemekten mutluluk duyarım. İster aşağıdaki formu doldurun, ister doğrudan iletişim kanallarımdan bana ulaşın. En kısa sürede geri dönüş yapacağım.</p>
    </div>

    <div class="contact-grid">
        <!-- ── SOL: İletişim Formu ── -->
        <div class="contact-form-section">
            <form action="#" method="POST" class="modern-contact-form">
                <h3>Bana Mesaj Gönderin</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label>Adınız Soyadınız</label>
                        <input type="text" placeholder="Size nasıl hitap edelim?" required>
                    </div>
                    <div class="form-group">
                        <label>E-posta Adresiniz</label>
                        <input type="email" placeholder="Mail adresiniz" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Konu</label>
                    <input type="text" placeholder="Hangi konuda yazıyorsunuz?" required>
                </div>
                <div class="form-group">
                    <label>Mesajınız</label>
                    <textarea rows="6" placeholder="Bana iletmek istediklerinizi buraya yazabilirsiniz..." required></textarea>
                </div>
                <button type="submit" class="contact-submit-btn">
                    Mesajı Gönder <i class="fas fa-paper-plane" style="margin-left:8px;"></i>
                </button>
            </form>
        </div>

        <!-- ── SAĞ: Bilgi Kartları ── -->
        <div class="contact-info-section">
            
            <div class="info-card">
                <div class="info-icon"><i class="fas fa-envelope-open-text"></i></div>
                <div class="info-text">
                    <h4>E-posta Adresi</h4>
                    <p><a href="mailto:ugurkantekin@gmail.com">ugurkantekin@gmail.com</a></p>
                </div>
            </div>
            
            <div class="info-card">
                <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                <div class="info-text">
                    <h4>Telefon & İletişim</h4>
                    <p><a href="tel:+905324044142">0532 404 41 42</a></p>
                </div>
            </div>

            <!-- WhatsApp Özel Kartı -->
            <div class="info-card whatsapp-card">
                <div class="info-icon"><i class="fab fa-whatsapp"></i></div>
                <div class="info-text">
                    <h4>Hızlı İletişim Hattı</h4>
                    <p><a href="https://wa.me/905324044142?text=Merhaba%20Ugur%20Bey,%20sitenizden%20ulasiyorum." target="_blank">WhatsApp'tan Yazın</a></p>
                </div>
            </div>

            <!-- Sosyal Medya Kartı -->
            <div class="social-links-card">
                <h4>Sosyal Medyadan Takip Edin</h4>
                <div class="social-icons">
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
