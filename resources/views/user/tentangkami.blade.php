@extends('layouts.user.app')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #0f172a;
    min-height: 100vh;
}

/* About Section - Modern Layout */
.about-modern-section {
    padding: 3rem 5% 3.5rem;
    background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
    min-height: 100vh;
}

.about-container {
    max-width: 1400px;
    margin: 0 auto;
}

/* Layout Grid */
.about-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
    margin-bottom: 5rem;
}

/* Text Side */
.about-text-side {
    padding-right: 2rem;
}

.about-subtitle {
    font-size: 0.95rem;
    font-weight: 600;
    color: #60a5fa;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.about-subtitle::before {
    content: '';
    width: 40px;
    height: 3px;
    background: #60a5fa;
}

.about-title {
    font-size: 3.5rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 2rem;
    line-height: 1.2;
    font-family: 'Playfair Display', serif;
}

.about-title span {
    background: linear-gradient(135deg, #60a5fa, #3b82f6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.about-description {
    font-size: 1.1rem;
    color: #cbd5e1;
    line-height: 1.9;
    margin-bottom: 2rem;
}

.about-description p {
    margin-bottom: 1.5rem;
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.95rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.back-link:hover {
    color: #ffffff;
    gap: 0.75rem;
}

.back-link svg {
    transition: transform 0.3s ease;
}

.back-link:hover svg {
    transform: translateX(-3px);
}

/* Image Side */
.about-image-side {
    position: relative;
}

.about-image-wrapper {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
}

.about-image-wrapper::before {
    content: '';
    position: absolute;
    top: -20px;
    right: -20px;
    width: 200px;
    height: 200px;
    background: linear-gradient(135deg, #3b82f6, #60a5fa);
    border-radius: 24px;
    z-index: -1;
    opacity: 0.3;
}

.about-main-image {
    width: 100%;
    height: 500px;
    object-fit: cover;
    display: block;
    border-radius: 24px;
}

/* Stats Section */
.about-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
    margin-top: 4rem;
    padding: 3rem;
    background: rgba(30, 58, 138, 0.3);
    backdrop-filter: blur(10px);
    border-radius: 24px;
    border: 1px solid rgba(96, 165, 250, 0.2);
}

.stat-item {
    text-align: center;
    padding: 1.5rem;
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-5px);
}

.stat-number {
    font-size: 3rem;
    font-weight: 700;
    color: #60a5fa;
    margin-bottom: 0.5rem;
    font-family: 'Playfair Display', serif;
}

.stat-label {
    font-size: 1rem;
    color: #cbd5e1;
    font-weight: 500;
}

/* Visi Misi & Sejarah Section */
.content-section {
    margin-top: 4rem;
    margin-bottom: 4rem;
}

.section-header {
    text-align: center;
    margin-bottom: 3rem;
}


.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 0.5rem;
    font-family: 'Playfair Display', serif;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.section-subtitle {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.8);
}

.content-card {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 24px;
    padding: 3rem;
    margin-bottom: 2rem;
}

.content-card:hover {
    border-color: rgba(255, 255, 255, 0.5);
    box-shadow: 0 20px 60px rgba(255, 255, 255, 0.2);
}

.content-card h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 1.5rem;
    font-family: 'Playfair Display', serif;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.content-card p {
    font-size: 1.05rem;
    color: rgba(255, 255, 255, 0.95);
    line-height: 1.9;
    margin-bottom: 1.5rem;
}

.misi-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.misi-item {
    display: flex;
    gap: 1rem;
    padding: 1.25rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.misi-item:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateX(10px);
    border-color: rgba(255, 255, 255, 0.4);
}

.misi-icon {
    flex-shrink: 0;
    width: 32px;
    height: 32px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.misi-text {
    flex: 1;
    color: rgba(255, 255, 255, 0.95);
    line-height: 1.7;
}

.timeline {
    position: relative;
    padding-left: 3rem;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 3px;
    background: rgba(255, 255, 255, 0.3);
}

.timeline-item {
    position: relative;
    margin-bottom: 2rem;
    padding-left: 2rem;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -3.5rem;
    top: 0;
    width: 16px;
    height: 16px;
    background: #ffffff;
    border-radius: 50%;
    border: 3px solid #2563eb;
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
}

.timeline-year {
    font-size: 1.3rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 0.5rem;
}

.timeline-content {
    font-size: 1.05rem;
    color: rgba(255, 255, 255, 0.95);
    line-height: 1.8;
}

/* Features Grid */
.about-features {
    margin-top: 5rem;
}

.features-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #ffffff;
    text-align: center;
    margin-bottom: 3rem;
    font-family: 'Playfair Display', serif;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.feature-card {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 20px;
    padding: 2.5rem;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-10px);
    border-color: rgba(255, 255, 255, 0.5);
    box-shadow: 0 20px 60px rgba(255, 255, 255, 0.2);
    background: rgba(255, 255, 255, 0.2);
}

.feature-icon {
    width: 70px;
    height: 70px;
    background: rgba(255, 255, 255, 0.25);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    color: white;
    font-size: 2rem;
}

.feature-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 1rem;
    font-family: 'Playfair Display', serif;
}

.feature-desc {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.95);
    line-height: 1.7;
}

/* Responsive */
@media (max-width: 1024px) {
    .about-grid {
        grid-template-columns: 1fr;
        gap: 3rem;
    }

    .about-text-side {
        padding-right: 0;
    }

    .about-title {
        font-size: 2.5rem;
    }

    .about-stats {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .about-modern-section {
        padding: 4rem 5% 3rem;
    }

    .about-title {
        font-size: 2rem;
    }

    .about-description {
        font-size: 1rem;
    }

    .about-main-image {
        height: 350px;
    }

    .about-stats {
        grid-template-columns: 1fr;
        gap: 1.5rem;
        padding: 2rem;
    }

    .stat-number {
        font-size: 2.5rem;
    }

    .features-grid {
        grid-template-columns: 1fr;
    }

    .about-cta-btn {
        width: 100%;
        justify-content: center;
    }
}

/* ========== Vision Spotlight (New) ========== */
.vision-section {
    background: #f6f7fb;
    padding: 4rem 5%;
    border-radius: 24px;
    margin-bottom: 3rem;
}

.vision-grid {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 520px 1fr;
    gap: 3rem;
    align-items: center;
}

.vision-images {
    position: relative;
}

.vision-card-lg {
    background: #ffffff;
    border-radius: 22px;
    box-shadow: 0 10px 30px rgba(0,0,0,.08);
    overflow: hidden;
    width: 100%;
    height: 420px;
    display: block;
}

.vision-card-lg img { width: 100%; height: 100%; object-fit: cover; display: block; }

.vision-since {
    position: absolute;
    top: 16px;
    left: 16px;
    color: #111827;
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    background: rgba(255,255,255,.85);
    padding: .4rem .7rem;
    border-radius: 999px;
    font-size: .9rem;
}

.vision-card-sm {
    position: absolute;
    bottom: -24px;
    left: 40px;
    width: 300px;
    height: 200px;
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,.12);
    overflow: hidden;
}

.vision-card-sm img { width: 100%; height: 100%; object-fit: cover; display: block; }

.vision-text .eyebrow {
    color: #1e3a8a;
    font-weight: 800;
    font-size: .95rem;
    letter-spacing: .2px;
}

.vision-title {
    font-family: 'Playfair Display', serif;
    color: #111827;
    font-size: 2.25rem;
    line-height: 1.25;
    margin: .4rem 0 1rem;
}

.vision-desc { color: #4b5563; margin-bottom: 1rem; }

.vision-note {
    border-left: 3px solid #e5e7eb;
    padding-left: 1rem;
    color: #6b7280;
    font-size: .95rem;
    margin: 1rem 0 1.25rem;
}

.vision-list { list-style: none; padding: 0; margin: 0 0 1.25rem 0; display: grid; gap: .6rem; }
.vision-list li { display: flex; align-items: center; gap: .6rem; color: #374151; font-weight: 600; }
.vision-list li svg { color: #16a34a; }

.vision-cta {
    display: inline-flex; align-items: center; gap: .5rem;
    background: #111827; color: #fff; border-radius: 10px;
    padding: .6rem 1rem; font-weight: 700; text-decoration: none;
}
.vision-cta:hover { background: #0f172a; text-decoration: none; }

@media (max-width: 1024px){
    .vision-grid{ grid-template-columns: 1fr; }
    .vision-card-sm{ position: relative; left: 0; bottom: 0; margin-top: 1rem; width: 70%; }
}

/* Scoped clean styles for Misi section */
#misi {
    background: #f6f7fb;
    padding: 2.5rem 2rem;
    border-radius: 24px;
}
#misi .section-title { color: #111827; }
#misi .section-subtitle { color: #6b7280; }
#misi .content-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(0,0,0,.06);
    padding: 2rem;
}
#misi .content-card h3 { color: #111827; }
#misi .misi-list { display: grid; gap: .8rem; }
#misi .misi-item {
    display: flex;
    gap: 1rem;
    padding: 1rem 1.25rem;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
}
#misi .misi-icon {
    width: 28px;
    height: 28px;
    background: #dcfce7;
    color: #16a34a;
    border-radius: 999px;
    display: flex; align-items: center; justify-content: center;
}
#misi .misi-text { color: #374151; }
</style>

<!-- About Section - Modern Layout -->
<div class="about-modern-section">
    <div class="about-container">
        
        <!-- Back to Home Link -->
        <div style="margin-bottom: 1.5rem;">
            <a href="{{ route('user.dashboard') }}" class="back-link">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                <span>Back to Home</span>
            </a>
        </div>
        
        <!-- Vision Spotlight (New) -->
        <section class="vision-section">
            <div class="vision-grid">
                <div class="vision-images">
                    <div class="vision-card-lg">
                        <img src="{{ asset('images/Henn213-DD5_3794-1-scaled.jpg') }}" alt="Visi Sekolah - Foto 1" onerror="this.onerror=null;this.src='{{ asset('images/publicimagesvision-2.jpg') }}';">
                    </div>
                </div>

                <div class="vision-text">
                    <div class="eyebrow">Visi Sekolah</div>
                    <h3 class="vision-title">Mencetak Generasi Berkarakter, Berprestasi, dan Siap Masa Depan</h3>
                    <p class="vision-desc">Kami berkomitmen membentuk peserta didik unggul dalam karakter, akademik, dan keterampilan abad 21 melalui ekosistem pembelajaran yang humanis, kolaboratif, dan berorientasi masa depan.</p>
                    <div class="vision-note">Kami percaya pembelajaran terbaik lahir dari pengalaman nyata, bimbingan yang tulus, dan lingkungan yang mendukung pertumbuhan setiap anak.</div>
                    <ul class="vision-list">
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                            Berkarakter kuat dan berbudi pekerti
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                            Berpikir kritis, kreatif, dan kolaboratif
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                            Kompeten teknologi dan siap kerja
                        </li>
                    </ul>
                    
                </div>
            </div>
        </section>

        <!-- Misi Section -->
        <div id="misi" class="content-section">
            <div class="section-header">
                <h2 class="section-title">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Misi Kami
                </h2>
                <p class="section-subtitle">Langkah Nyata Mewujudkan Pendidikan Berkualitas</p>
            </div>

            <div class="content-card">
                <h3>
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Misi Kami
                </h3>
                <ul class="misi-list">
                    <li class="misi-item">
                        <div class="misi-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </div>
                        <div class="misi-text">
                            Menyelenggarakan pendidikan kejuruan berkualitas tinggi dengan kurikulum yang selalu diperbarui sesuai perkembangan industri dan teknologi terkini.
                        </div>
                    </li>
                    <li class="misi-item">
                        <div class="misi-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </div>
                        <div class="misi-text">
                            Menyediakan fasilitas pembelajaran modern dan lengkap yang mendukung praktik kerja nyata untuk mempersiapkan siswa menghadapi dunia industri.
                        </div>
                    </li>
                    <li class="misi-item">
                        <div class="misi-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </div>
                        <div class="misi-text">
                            Memberdayakan tenaga pengajar profesional dan berpengalaman melalui program pelatihan berkelanjutan untuk meningkatkan kualitas pembelajaran.
                        </div>
                    </li>
                    <li class="misi-item">
                        <div class="misi-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </div>
                        <div class="misi-text">
                            Membangun karakter siswa yang berintegritas, disiplin, dan memiliki etos kerja tinggi untuk menjadi profesional yang bertanggung jawab.
                        </div>
                    </li>
                    <li class="misi-item">
                        <div class="misi-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </div>
                        <div class="misi-text">
                            Memfasilitasi kerjasama dengan industri untuk peluang magang dan penempatan kerja, serta membangun jaringan profesional yang luas.
                        </div>
                    </li>
                    <li class="misi-item">
                        <div class="misi-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </div>
                        <div class="misi-text">
                            Mengembangkan soft skills dan leadership untuk kesuksesan karir jangka panjang dan kemampuan beradaptasi di lingkungan kerja yang dinamis.
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Features Section -->
        <div class="about-features">
            <h2 class="features-title">Keunggulan Kami</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Pendidikan Berkualitas</h3>
                    <p class="feature-desc">Kurikulum modern yang disesuaikan dengan kebutuhan industri dan perkembangan teknologi terkini.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Guru Berpengalaman</h3>
                    <p class="feature-desc">Tenaga pengajar profesional dengan pengalaman industri yang luas dan dedikasi tinggi.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Fasilitas Lengkap</h3>
                    <p class="feature-desc">Laboratorium dan workshop dengan peralatan modern untuk mendukung pembelajaran praktik.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Siap Kerja</h3>
                    <p class="feature-desc">Program magang dan kerjasama industri untuk mempersiapkan siswa memasuki dunia kerja.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Inovasi & Kreativitas</h3>
                    <p class="feature-desc">Mendorong siswa untuk berinovasi dan mengembangkan kreativitas dalam setiap pembelajaran.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Jaringan Luas</h3>
                    <p class="feature-desc">Kerjasama dengan berbagai perusahaan dan institusi untuk peluang karir yang lebih baik.</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
