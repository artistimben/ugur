@extends('layouts.app')

@section('content')
    <div class="breadcrumb" style="margin-bottom: 30px; text-align: center;">
        <a href="{{ route('home') }}">Ana sayfa</a> / İletişim
    </div>
    
    <div class="post-body contact-container">
        <p class="contact-intro">Benimle iletişime geçmek için aşağıdaki kanalları kullanabilirsiniz. Size yardımcı olmaktan mutluluk duyarım.</p>
        
        <div class="contact-grid">
            <!-- Mail Card -->
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <h3>E-posta</h3>
                <p><a href="mailto:ugurkantekin@gmail.com">ugurkantekin@gmail.com</a></p>
            </div>

            <!-- Phone Card -->
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3>Telefon</h3>
                <p><a href="tel:+905324044142">0532 404 41 42</a></p>
            </div>

            <!-- WhatsApp Card -->
            <div class="contact-card whatsapp">
                <div class="contact-icon">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <h3>WhatsApp</h3>
                <p><a href="https://wa.me/905324044142?text=Merhaba%20Ugur%20Bey,%20sitenizden%20ulasiyorum." target="_blank">Hemen Yazın</a></p>
            </div>
        </div>

        <div class="contact-footer-text">
            <p>Düşüncelerinizi paylaşmak veya danışmanlık talepleriniz için dilediğiniz zaman ulaşabilirsiniz.</p>
        </div>
    </div>

    <style>
        .contact-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        .contact-intro {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 40px;
            font-style: italic;
        }
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        .contact-card {
            background: #fff;
            padding: 30px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #f0f0f0;
        }
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .contact-icon {
            font-size: 2.5rem;
            color: var(--accent);
            margin-bottom: 15px;
        }
        .contact-card h3 {
            font-family: 'Cabin', sans-serif;
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #333;
        }
        .contact-card p a {
            color: #555;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }
        .contact-card p a:hover {
            color: var(--accent);
        }
        .contact-card.whatsapp {
            background: #f4fff8;
            border-color: #25d36633;
        }
        .contact-card.whatsapp .contact-icon {
            color: #25d366;
        }
        .contact-card.whatsapp p a {
            color: #128c7e;
            font-weight: bold;
        }
        .contact-footer-text {
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px dashed #eee;
            color: #888;
            font-size: 0.95rem;
        }
    </style>
@endsection
