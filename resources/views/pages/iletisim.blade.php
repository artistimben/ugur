@extends('layouts.app')

@section('content')
<div class="container">
    <article class="single-post">
        <header class="single-post-header">
            <h1 style="font-size: 56px; margin-bottom: 24px;">İletişim</h1>
            <div class="single-post-meta">
                <span>Dilek, öneri ve talepleriniz için bana ulaşabilirsiniz.</span>
            </div>
        </header>

        <div class="single-post-content" style="max-width: 900px;">
            <div class="contact-methods-grid" style="margin: 60px 0;">
                
                <!-- Email -->
                <div class="contact-method-card">
                    <i class="fas fa-envelope-open-text"></i>
                    <h3>E-posta</h3>
                    <p><a href="mailto:ugurkantekin@gmail.com">ugurkantekin@gmail.com</a></p>
                </div>

                <!-- Phone -->
                <div class="contact-method-card">
                    <i class="fas fa-phone-alt"></i>
                    <h3>Telefon</h3>
                    <p><a href="tel:+905324044142">0532 404 41 42</a></p>
                </div>

                <!-- WhatsApp -->
                <div class="contact-method-card whatsapp">
                    <i class="fab fa-whatsapp"></i>
                    <h3>WhatsApp</h3>
                    <p><a href="https://wa.me/905324044142?text=Merhaba%20Ugur%20Bey,%20sitenizden%20ulasiyorum." target="_blank">Hemen Yazın</a></p>
                </div>
            </div>

            <div style="margin-top: 80px; text-align: center; padding: 60px; border-top: 1px solid var(--border-color);">
                <h4 style="font-family: var(--font-heading); font-size: 24px; margin-bottom: 16px;">Bir mesajınız mı var?</h4>
                <p style="color: var(--text-muted); font-size: 16px;">Düşüncelerinizi paylaşmak veya danışmanlık talepleriniz için dilediğiniz zaman ulaşabilirsiniz.</p>
                <div style="margin-top: 40px; font-size: 20px; color: var(--accent-color);">
                    <i class="fab fa-instagram" style="margin: 0 16px;"></i>
                    <i class="fab fa-facebook" style="margin: 0 16px;"></i>
                    <i class="fab fa-twitter" style="margin: 0 16px;"></i>
                </div>
            </div>
        </div>
    </article>
</div>
@endsection
