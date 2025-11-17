<footer class="footer-modern">
    <div class="footer-decorative">
        <div class="diagonal-line"></div>
        <div class="dots-pattern">
            <span></span><span></span><span></span><span></span><span></span>
            <span></span><span></span><span></span><span></span><span></span>
        </div>
    </div>
    
    <div class="footer-container">
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="brand-content">
                    <div class="brand-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h2>Galeri Sekolah</h2>
                </div>
                <p>Shrewsbury International School - Membentuk generasi unggul yang siap menghadapi tantangan masa depan dengan keahlian dan karakter yang kuat.</p>
            </div>

            <div class="footer-links">
                <h3>
                    <i class="fas fa-compass"></i>
                    Navigasi
                </h3>
                <ul>
                    <li><a href="#home"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                    <li><a href="#tentang"><i class="fas fa-chevron-right"></i> Berita Terkini</a></li>
                    <li><a href="#galeri"><i class="fas fa-chevron-right"></i> Galeri</a></li>
                    <li><a href="#agenda"><i class="fas fa-chevron-right"></i> Agenda</a></li>
                    <li><a href="#info"><i class="fas fa-chevron-right"></i> Hubungi Kami</a></li>
                </ul>
            </div>

            <div class="footer-info">
                <h3>
                    <i class="fas fa-info-circle"></i>
                    Informasi Kontak
                </h3>
                <ul>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <span>+62 812-3456-7890</span>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <span>info@shrewsburyinternationalschool.sch.id</span>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jl. Raya Tajur No.4, Bogor</span>
                    </li>
                </ul>
            </div>

            <div class="footer-hours">
                <h3>
                    <i class="fas fa-clock"></i>
                    Jam Operasional
                </h3>
                <ul>
                    <li>
                        <span class="day">Senin - Kamis</span>
                        <span class="time">07:00 - 15:00</span>
                    </li>
                    <li>
                        <span class="day">Jumat</span>
                        <span class="time">07:00 - 11:00</span>
                    </li>
                    <li>
                        <span class="day">Sabtu - Minggu</span>
                        <span class="time closed">Tutup</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <p>&copy; <span id="year"></span> Shrewsbury International School. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<style>
:root {
    --footer-primary: #374151;
    --footer-secondary: #4b5563;
    --footer-accent: #6b7280;
    --footer-text: #f3f4f6;
    --footer-text-dim: #d1d5db;
    --footer-hover: #9ca3af;
}

.footer-modern {
    background: linear-gradient(135deg, var(--footer-primary) 0%, var(--footer-secondary) 100%);
    color: var(--footer-text);
    font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
    position: relative;
    margin-top: 4rem;
    margin-left: 0;
    overflow: hidden;
    transition: margin-left 0.3s ease;
}

/* Margin left only for admin pages with sidebar */
body:has(.sidebar):not(:has(.sidebar.collapsed)) .footer-modern {
    margin-left: 280px;
}

.footer-decorative {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, var(--footer-accent), var(--footer-hover), var(--footer-accent));
    background-size: 200% 100%;
    animation: gradientShift 3s ease infinite;
}

.diagonal-line {
    position: absolute;
    top: 20px;
    right: 0;
    width: 300px;
    height: 300px;
    background: linear-gradient(135deg, transparent 48%, rgba(66, 153, 225, 0.1) 48%, rgba(66, 153, 225, 0.1) 52%, transparent 52%);
    pointer-events: none;
}

.dots-pattern {
    position: absolute;
    top: 30px;
    left: 50px;
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 15px;
    opacity: 0.15;
}

.dots-pattern span {
    width: 8px;
    height: 8px;
    background: var(--footer-accent);
    border-radius: 50%;
    animation: dotPulse 2s ease-in-out infinite;
}

.dots-pattern span:nth-child(2) { animation-delay: 0.2s; }
.dots-pattern span:nth-child(3) { animation-delay: 0.4s; }
.dots-pattern span:nth-child(4) { animation-delay: 0.6s; }
.dots-pattern span:nth-child(5) { animation-delay: 0.8s; }
.dots-pattern span:nth-child(6) { animation-delay: 1s; }
.dots-pattern span:nth-child(7) { animation-delay: 1.2s; }
.dots-pattern span:nth-child(8) { animation-delay: 1.4s; }
.dots-pattern span:nth-child(9) { animation-delay: 1.6s; }
.dots-pattern span:nth-child(10) { animation-delay: 1.8s; }

@keyframes gradientShift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

@keyframes dotPulse {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.2); }
}

.footer-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 2.5rem 2rem 1.5rem;
    position: relative;
    z-index: 1;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 2rem;
}

/* Brand Section */
.footer-brand {
    grid-column: span 1;
}

.brand-content {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.brand-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--footer-accent), var(--footer-hover));
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: white;
    box-shadow: 0 2px 10px rgba(107, 114, 128, 0.3);
}

.footer-brand h2 {
    font-size: 1.25rem;
    font-weight: 700;
    color: white;
    margin: 0;
    letter-spacing: -0.3px;
}

.footer-brand p {
    font-size: 0.85rem;
    line-height: 1.6;
    color: var(--footer-text-dim);
    margin-bottom: 1rem;
}

.footer-social {
    display: flex;
    gap: 0.5rem;
    margin-top: 1rem;
}

.footer-social a {
    width: 36px;
    height: 36px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--footer-text);
    font-size: 0.95rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-social a:hover {
    background: var(--footer-accent);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(66, 153, 225, 0.4);
}

/* Links Section */
.footer-links h3,
.footer-info h3,
.footer-hours h3 {
    font-size: 1rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.footer-links h3 i,
.footer-info h3 i,
.footer-hours h3 i {
    color: var(--footer-accent);
    font-size: 1.1rem;
}

.footer-links ul,
.footer-info ul,
.footer-hours ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links ul li {
    margin-bottom: 0.6rem;
}

.footer-links ul li a {
    color: var(--footer-text-dim);
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.85rem;
}

.footer-links ul li a i {
    font-size: 0.7rem;
    color: var(--footer-accent);
    transition: transform 0.3s ease;
}

.footer-links ul li a:hover {
    color: var(--footer-hover);
    padding-left: 0.5rem;
}

.footer-links ul li a:hover i {
    transform: translateX(3px);
}

/* Info Section */
.footer-info ul li {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    margin-bottom: 0.85rem;
    color: var(--footer-text-dim);
    font-size: 0.85rem;
}

.footer-info ul li i {
    color: var(--footer-accent);
    font-size: 0.9rem;
    margin-top: 0.15rem;
    min-width: 18px;
}

/* Hours Section */
.footer-hours ul li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.6rem 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    font-size: 0.85rem;
}

.footer-hours ul li:last-child {
    border-bottom: none;
}

.footer-hours .day {
    color: var(--footer-text);
    font-weight: 500;
}

.footer-hours .time {
    color: var(--footer-accent);
    font-weight: 600;
}

.footer-hours .time.closed {
    color: #fc8181;
}

/* Footer Bottom */
.footer-bottom {
    background: rgba(0, 0, 0, 0.2);
    margin-top: 2rem;
    padding: 1.25rem 2rem;
    backdrop-filter: blur(10px);
    border-top: 1px solid rgba(255, 255, 255, 0.08);
}

.footer-bottom-content {
    max-width: 1280px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.75rem;
}

.footer-bottom-content p {
    margin: 0;
    color: var(--footer-text-dim);
    font-size: 0.8rem;
}

.footer-love {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.footer-love i {
    color: #fc8181;
    animation: heartbeat 1.5s ease-in-out infinite;
}

@keyframes heartbeat {
    0%, 100% { transform: scale(1); }
    25% { transform: scale(1.1); }
    50% { transform: scale(1); }
}

/* Responsive Design */
@media (max-width: 1024px) {
    body:has(.sidebar) .footer-modern {
        margin-left: 0;
    }
}

@media (max-width: 768px) {
    .footer-grid {
        grid-template-columns: 1fr;
        gap: 2.5rem;
    }
    
    .diagonal-line,
    .dots-pattern {
        display: none;
    }
    
    .footer-container {
        padding: 3rem 1.5rem 1.5rem;
    }
    
    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
    }
    
    .brand-content {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-social {
        justify-content: center;
    }
}

@media (min-width: 769px) and (max-width: 1024px) {
    .footer-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<script>
document.getElementById('year').textContent = new Date().getFullYear();
</script>

@if(request()->routeIs('user.tentangkami') || request()->routeIs('user.news.show'))
    <style>
        /* Hilangkan garis/border di bawah halaman untuk Tentang Kami & Detail Berita */
        .footer-bottom {
            border-top: none !important;
        }

        /* Sembunyikan garis dekoratif biru di bagian atas footer */
        .footer-decorative {
            display: none !important;
        }

        /* Hilangkan jarak kosong/navy di atas footer */
        .footer-modern {
            margin-top: 0 !important;
        }
    </style>
@endif

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">