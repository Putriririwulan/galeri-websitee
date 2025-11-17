@extends('layouts.user.app')

@section('content')
<style>
/* Styling untuk bagian berita */
.gallery-header-band {
    background-color: #f8fafc;
    padding: 2rem 0 1rem;
}

.gallery-cards-band.news-section {
    background-color: #f8fafc;
    padding: 1rem 0 3rem;
}

.main-content {
    width: 100%;
    overflow-x: hidden;
    position: relative;
    z-index: 1;
}

:root {
    --primary-color: #ffffff;
    --secondary-color: #f1f5f9;
    --tertiary-color: #1e3a8a;
    --quaternary-color: #cbd5e1;
    --quinary-color: #1e40af;
    --navy-dark: #1e3a8a;
    --navy-light: #3b82f6;
}


/* ===== Hero Section ===== */
.galaxy-hero {
    position: relative;
    min-height: 80vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-image: url('https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=2000');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    overflow: visible;
    scroll-margin-top: 70px;
    width: 100%;
    margin: 0;
    padding: 4rem 5%;
    z-index: 1;
}

/* Overlay biru transparan untuk hero */
.galaxy-hero::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(30, 58, 138, 0.85) 0%, rgba(12, 74, 110, 0.85) 50%, rgba(22, 78, 99, 0.85) 100%);
    z-index: 1;
    pointer-events: none;
}


/* Wave Divider at bottom of hero */
.wave-divider {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    z-index: 2;
}

.wave-divider svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 80px;
}

.wave-divider .shape-fill {
    fill: rgba(30, 58, 138, 0.5);
}


.hero-content {
    max-width: 800px;
    padding: 2rem 0;
    z-index: 10;
    position: relative;
    text-align: center;
}

.hero-welcome {
    font-size: 0.85rem;
    font-weight: 600;
    color: #ffffff;
    margin-bottom: 0.85rem;
    font-family: 'Poppins', sans-serif;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.hero-title {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 700;
    margin-bottom: 1.25rem;
    color: #ffffff;
    text-transform: none;
    letter-spacing: -0.5px;
    line-height: 1.3;
    font-family: 'Poppins', 'Outfit', sans-serif;
}

.hero-title .highlight {
    color: #ffffff;
    display: inline-block;
}

.hero-subtitle {
    font-size: 0.95rem;
    margin-bottom: 2rem;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.6;
    font-family: 'Inter', sans-serif;
    font-weight: 400;
    max-width: 550px;
    margin-left: auto;
    margin-right: auto;
}

.hero-buttons {
    display: flex;
    gap: 1rem;
    align-items: center;
    justify-content: center;
    margin-bottom: 3rem;
}

.btn-primary {
    background: #ffffff;
    color: #1e3a8a;
    padding: 0.85rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.95rem;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    border: none;
    font-family: 'Poppins', sans-serif;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-primary:hover::before {
    left: 100%;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    background: #f1f5f9;
}


.btn-secondary {
    background: transparent;
    backdrop-filter: blur(10px);
    color: #fff;
    padding: 0.75rem 1.75rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.95rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid rgba(255, 255, 255, 0.5);
    font-family: 'Poppins', sans-serif;
}

.btn-secondary:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.8);
    transform: translateY(-2px);
    text-decoration: none;
    color: #fff;
    box-shadow: 0 10px 30px rgba(34, 211, 238, 0.3);
}

.hero-stats {
    display: flex;
    gap: 2rem;
    margin-top: 1rem;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.stat-icon {
    width: 24px;
    height: 24px;
    color: #22d3ee;
}

.stat-text {
    color: #94a3b8;
    font-size: 0.8rem;
    font-family: 'Inter', sans-serif;
}

.stat-number {
    color: #22d3ee;
    font-weight: 700;
    font-size: 1rem;
    text-shadow: 0 0 10px rgba(34, 211, 238, 0.3);
}


/* ===== Gallery & News Section - Clean Modern Layout ===== */
/* Gallery Header Section - White Background */
.gallery-header-band {
    background: #ffffff;
    /* Full-bleed band */
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
    width: 100vw;
    padding: 2rem 0 1rem 0;
}

/* Gallery Cards Section - Blue Gradient Background */
.gallery-cards-band {
    background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    /* Full-bleed band */
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
    width: 100vw;
    padding: 1rem 0 3rem 0;
}

/* News Cards Section - remove blue gradient so area di atas footer tidak berwarna biru penuh */
.gallery-cards-band.news-section {
    background: transparent;
}

.user-gallery-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
    scroll-margin-top: 70px;
    position: relative;
}

.user-gallery-title {
    font-family: 'Inter', sans-serif;
    font-size: 2.25rem;
    font-weight: 800;
    letter-spacing: 0.2px;
    margin-bottom: 0.5rem;
    color: #111827;
    position: relative;
    padding-bottom: 1.25rem;
    text-align: center;
}

.user-gallery-title::after {
    content: none;
    display: none;
}

.user-gallery-subtitle {
    text-align: center;
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    color: #6b7280;
    margin-bottom: 2rem;
    font-weight: 500;
}

.user-gallery-row {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

/* ===== Clean Modern Cards ===== */
.user-gallery-card {
    background: #ffffff !important;
    backdrop-filter: none;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.user-gallery-card:hover {
    transform: translateY(-3px);
    border-color: #d1d5db;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.image-wrapper {
    position: relative;
    height: 180px;
    overflow: hidden;
    border-radius: 12px;
}

.image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.35s ease;
    display: block;
}

.user-gallery-card:hover .image-wrapper img {
    transform: scale(1.05);
}

/* Make footer flat only in the gallery section */
.user-gallery-container .card-footer-dates { 
    background: transparent; 
    border-top: none; 
}
.user-gallery-container .date-label { 
    color: #6b7280; 
}
.user-gallery-container .date-value { 
    color: #111827; 
}

/* Category Badge - Add this via pseudo-element */
.user-gallery-card > img {
    position: relative;
}

/* Card Body */
.card-body {
    padding: 1.25rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    flex-grow: 1;
    background: #ffffff !important;
}

.card-title {
    color: #111827;
    font-weight: 700;
    font-size: 1rem;
    line-height: 1.4;
    font-family: 'Inter', sans-serif;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-text {
    font-size: 0.9rem;
    color: #374151;
    line-height: 1.6;
    flex-grow: 1;
    font-family: 'Inter', sans-serif;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Card Footer - Date Info */
.card-footer-dates {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 1.25rem;
    background: #ffffff !important;
    border-top: 1px solid #e5e7eb;
}

.date-item {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.date-label {
    font-size: 0.65rem;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
    font-family: 'Inter', sans-serif;
}

.date-value {
    font-size: 0.8rem;
    color: #111827;
    font-weight: 700;
    font-family: 'Inter', sans-serif;
}

/* Category Badge */
.category-badge {
    position: static;
    display: inline-block;
    background: linear-gradient(135deg, #1e3a8a, #2563eb);
    color: #ffffff;
    padding: 0.3rem 0.7rem;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: none;
    letter-spacing: 0.2px;
    z-index: auto;
    font-family: 'Inter', sans-serif;
}

/* Button Lihat Detail untuk kartu galeri */
.gallery-detail-btn {
    display: block;
    width: calc(100% - 3.5rem);
    margin: 0 1.75rem 0.9rem 1.75rem;
    text-align: center;
    background: linear-gradient(135deg, #1e3a8a, #2563eb);
    color: #ffffff;
    padding: 0.6rem 0.9rem;
    border-radius: 10px;
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none;
    transition: background 0.2s ease, transform 0.2s ease;
}

.gallery-detail-btn:hover {
    background: linear-gradient(135deg, #1d4ed8, #3b82f6);
    transform: translateY(-1px);
    text-decoration: none;
}

/* Tombol Lihat Semua Galeri */
.btn-lihat-semua-galeri {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.85rem 2.5rem;
    border-radius: 0.75rem;
    background-color: #1e40af;
    color: #ffffff;
    font-size: 0.95rem;
    font-weight: 700;
    text-decoration: none;
    border: none;
    box-shadow: 0 10px 25px rgba(15, 23, 42, 0.35);
    transition: background-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
}

.btn-lihat-semua-galeri svg {
    display: inline-block;
}

.btn-lihat-semua-galeri:hover {
    background-color: #1e3a8a;
    box-shadow: 0 14px 30px rgba(15, 23, 42, 0.45);
    transform: translateY(-1px);
    text-decoration: none;
}

/* Button Selengkapnya */
.btn-selengkapnya {
    margin-top: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(59, 130, 246, 0.15);
    border: 1px solid rgba(59, 130, 246, 0.3);
    border-radius: 6px;
    color: #60a5fa;
    font-size: 0.8rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Inter', sans-serif;
}

.btn-selengkapnya:hover {
    background: rgba(59, 130, 246, 0.25);
    border-color: rgba(59, 130, 246, 0.5);
    color: #93c5fd;
}

/* Empty State */
.user-gallery-empty {
    grid-column: 1 / -1;
    text-align: center;
    padding: 3rem;
    color: rgba(255, 255, 255, 0.6);
    font-size: 1rem;
}

/* ===== News Card - Grid Layout for Berita Terkini ===== */
.news-section .user-gallery-row {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 1.5rem;
}

.news-card {
    background: #ffffff !important;
    backdrop-filter: none;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
    cursor: pointer;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.news-card:hover {
    transform: translateY(-4px) scale(1.01);
    box-shadow: 0 12px 20px rgba(15, 23, 42, 0.25);
}

.news-thumb {
    position: relative;
    width: 100%;
    padding-top: 56.25%; /* 16:9 */
    overflow: hidden;
}

.news-thumb img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.35s ease;
}

.news-card:hover .news-thumb img {
    transform: scale(1.05);
}

.news-category-badge {
    position: absolute;
    top: 0.75rem;
    left: 0.75rem;
    background: linear-gradient(135deg, #1e3a8a, #2563eb);
    color: #ffffff;
    padding: 0.3rem 0.7rem;
    border-radius: 999px;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
}

.news-card-body {
    padding: 1.25rem 1.25rem 1.35rem;
    display: flex;
    flex-direction: column;
    gap: 0.6rem;
    flex: 1;
}

.news-meta {
    font-size: 0.8rem;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.news-meta i {
    color: #2563eb;
}

.news-card-title {
    font-size: 1rem;
    font-weight: 700;
    color: #111827;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.news-card-excerpt {
    font-size: 0.9rem;
    color: #4b5563;
    line-height: 1.6;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.news-readmore-btn {
    margin-top: 0.75rem;
    align-self: flex-start;
    background: linear-gradient(135deg, #1e3a8a, #2563eb);
    color: #ffffff;
    padding: 0.55rem 1.35rem;
    border-radius: 999px;
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    transition: background 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
}

.news-readmore-btn:hover {
    background: linear-gradient(135deg, #1d4ed8, #3b82f6);
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(30, 64, 175, 0.35);
    text-decoration: none;
}

#news-loading {
    grid-column: 1 / -1;
    text-align: center;
    padding: 2rem 0;
    color: #e5e7eb;
    font-size: 0.95rem;
}

.news-see-all-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.55rem 1.4rem;
    border-radius: 999px;
    background: #1e3a8a;
    color: #ffffff;
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    border: none;
    box-shadow: 0 6px 14px rgba(15, 23, 42, 0.35);
    transition: background 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
}

.news-see-all-btn:hover {
    background: #2563eb;
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(37, 99, 235, 0.45);
    text-decoration: none;
}

/* Responsive grid: 2 kolom tablet, 1 kolom mobile */
@media (max-width: 1024px) {
    .news-section .user-gallery-row {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 768px) {
    .news-section .user-gallery-row {
        grid-template-columns: repeat(1, minmax(0, 1fr));
    }
}
    background: radial-gradient(circle, rgba(139, 92, 246, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    bottom: -150px;
    left: -150px;
    animation: floatParticle2 25s ease-in-out infinite;
    pointer-events: none;
    z-index: 0;
}

@keyframes floatParticle1 {
    0%, 100% {
        transform: translate(0, 0) scale(1);
        opacity: 0.3;
    }
    50% {
        transform: translate(50px, 50px) scale(1.2);
        opacity: 0.5;
    }
}

@keyframes floatParticle2 {
    0%, 100% {
        transform: translate(0, 0) scale(1);
        opacity: 0.2;
    }
    50% {
        transform: translate(-30px, -30px) scale(1.3);
        opacity: 0.4;
    }
}

.user-gallery-row {
    position: relative;
    z-index: 1;
}

/* Tombol Selengkapnya */
.btn-selengkapnya {
    background: linear-gradient(135deg, #1e3a8a, #2563eb);
    color: white;
    border: none;
    padding: 0.7rem 1.25rem;
    border-radius: 10px;
    font-size: 0.85rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 0.5rem;
    width: 100%;
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
    font-family: 'Inter', sans-serif;
    letter-spacing: 0.3px;
}

.btn-selengkapnya:hover {
    background: linear-gradient(135deg, #2563eb, #3b82f6);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(30, 58, 138, 0.5);
}

/* ===== NEW MODAL STYLES - MODERN DESIGN ===== */
.news-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.95));
    backdrop-filter: blur(10px);
    animation: fadeIn 0.4s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.news-modal-content {
    background: transparent;
    margin: 2% auto;
    padding: 0;
    border-radius: 20px;
    width: 90%;
    max-width: 900px;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(148, 163, 184, 0.35);
    animation: slideUp 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    max-height: 92vh;
    overflow: hidden;
    position: relative;
}

.news-modal-topbar {
    background: #1d4ed8;
    color: #f9fafb;
    padding: 1rem 2.25rem;
    font-size: 1.2rem;
    font-weight: 700;
    border-radius: 20px 20px 0 0;
}

.news-modal-inner {
    background: #f9fafb;
    border-radius: 0 0 20px 20px;
}

@keyframes slideUp {
    from {
        transform: translateY(60px) scale(0.95);
        opacity: 0;
    }
    to {
        transform: translateY(0) scale(1);
        opacity: 1;
    }
}

/* Close Button */
.news-modal-close-btn {
    position: absolute;
    right: 20px;
    top: 20px;
    z-index: 100;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #e2e8f0;
}

.news-modal-close-btn:hover {
    background: rgba(239, 68, 68, 0.2);
    border-color: #ef4444;
    color: #ef4444;
    transform: rotate(90deg);
}

/* Header dengan Image */
.news-modal-header-new {
    position: relative;
    overflow: hidden;
    padding: 1.75rem 2.25rem 0;
}

.news-modal-image-wrapper {
    position: relative;
    width: 100%;
    height: 320px;
    overflow: hidden;
    border-radius: 18px;
}

.news-modal-image-new {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.news-modal-content:hover .news-modal-image-new {
    transform: scale(1.05);
}

.news-modal-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 0%, rgba(15, 23, 42, 0.8) 100%);
}

/* Badge Container */
.news-modal-badge-container {
    position: absolute;
    bottom: 20px;
    left: 30px;
    right: 30px;
    display: flex;
    align-items: center;
    gap: 1rem;
    z-index: 10;
}

.news-modal-badge-new {
    background: #1e3a8a;
    color: white;
    padding: 0.55rem 1.1rem;
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    display: flex;
    align-items: center;
    gap: 0.45rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}

.news-modal-date-new {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    color: #e2e8f0;
    padding: 0.55rem 1.1rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.45rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Body */
.news-modal-body-new {
    padding: 1.75rem 2.25rem 1.85rem;
    max-height: calc(92vh - 350px - 100px);
    overflow-y: auto;
    background: #f9fafb;
}

.news-modal-body-new::-webkit-scrollbar {
    width: 8px;
}

.news-modal-body-new::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
}

.news-modal-body-new::-webkit-scrollbar-thumb {
    background: rgba(84, 131, 179, 0.5);
    border-radius: 10px;
}

.news-modal-body-new::-webkit-scrollbar-thumb:hover {
    background: rgba(84, 131, 179, 0.7);
}

.news-modal-title-new {
    font-size: 1.75rem;
    font-weight: 800;
    color: #0f172a;
    margin: 0 0 1.25rem 0;
    line-height: 1.3;
    letter-spacing: -0.5px;
}

.news-modal-content-text {
    color: #4b5563;
    font-size: 0.975rem;
    line-height: 1.8;
    text-align: left;
}

.news-modal-content-text p {
    margin: 0;
    white-space: pre-wrap;
}

/* Footer */
.news-modal-footer-new {
    padding: 1.35rem 2.25rem;
    background: #f3f4f6;
    border-top: 1px solid rgba(148, 163, 184, 0.4);
    display: flex;
    gap: 1.75rem;
    flex-wrap: wrap;
}

.news-modal-info-item {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    flex: 1;
    min-width: 200px;
}

.news-modal-info-item svg {
    color: #5483B3;
    flex-shrink: 0;
    margin-top: 2px;
}

.news-modal-info-item > div {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.info-label {
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #64748b;
}

.info-value {
    font-size: 0.875rem;
    font-weight: 600;
    color: #e2e8f0;
}

/* Image Wrapper for Badge */
.image-wrapper {
    position: relative;
    overflow: hidden;
}

/* ===== Jurusan Cards Section ===== */
.jurusan-section {
    width: 100%;
    padding: 5rem 5% 8rem;
    background: rgba(30, 58, 138, 0.3);
    position: relative;
    z-index: 10;
}

.jurusan-container {
    max-width: 1400px;
    margin: -180px auto 0;
    position: relative;
    z-index: 20;
}

.jurusan-title {
    font-family: 'Poppins', 'Inter', sans-serif;
    font-size: 1.75rem;
    font-weight: 700;
    text-align: center;
    letter-spacing: -0.5px;
    margin-bottom: 2rem;
    color: #ffffff;
}

.jurusan-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
    perspective: 1000px;
}

.jurusan-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    padding: 1.75rem 1.15rem;
    text-align: center;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
}

.jurusan-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(34, 211, 238, 0.1), rgba(6, 182, 212, 0.05));
    opacity: 0;
    transition: opacity 0.4s ease;
}

.jurusan-card:hover::before {
    opacity: 1;
}

.jurusan-card:hover {
    transform: translateY(-10px);
    border-color: rgba(255, 255, 255, 0.4);
    box-shadow: 0 12px 48px rgba(0, 0, 0, 0.3);
    background: rgba(255, 255, 255, 0.15);
}

.jurusan-icon {
    width: 56px;
    height: 56px;
    margin: 0 auto 1.1rem;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    transition: all 0.4s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.jurusan-card:hover .jurusan-icon {
    background: rgba(255, 255, 255, 0.3);
    color: #ffffff;
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.jurusan-card-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 0.45rem;
    font-family: 'Outfit', 'Inter', sans-serif;
}

.jurusan-card-subtitle {
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 0.7rem;
    font-weight: 600;
}

.jurusan-card-desc {
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.75);
    line-height: 1.55;
    margin: 0;
}

/* Empty State */
.user-gallery-empty {
    grid-column: 1 / -1;
    text-align: center;
    padding: 3rem 2rem;
    color: rgba(255, 255, 255, 0.8);
    font-size: 1rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    border: 1px dashed rgba(255, 255, 255, 0.3);
}

/* ===== About Section - Modern Layout ===== */
.about-section-simple {
    width: 100%;
    padding: 5rem 5%;
    background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    scroll-margin-top: 70px;
    position: relative;
    z-index: 1;
}

.about-simple-container {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}

/* Text Side */
.about-text-content {
    padding-right: 2rem;
}

.about-simple-subtitle {
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

.about-simple-subtitle::before {
    content: '';
    width: 40px;
    height: 3px;
    background: #60a5fa;
}

.about-simple-title {
    font-size: 3rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    font-family: 'Playfair Display', serif;
}

.about-simple-title span {
    background: linear-gradient(135deg, #60a5fa, #93c5fd);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.about-simple-desc {
    font-size: 1.05rem;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.8;
    margin-bottom: 2rem;
}

.about-simple-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 2.5rem;
    background: #ffffff;
    border: none;
    border-radius: 50px;
    color: #1e3a8a;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    text-decoration: none;
}

.about-simple-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
    background: #f1f5f9;
}

.about-simple-btn svg {
    transition: transform 0.3s ease;
}

.about-simple-btn:hover svg {
    transform: translateX(5px);
}

/* Image Side */
.about-image-content {
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
    background: linear-gradient(135deg, #60a5fa, #93c5fd);
    border-radius: 24px;
    z-index: -1;
    opacity: 0.3;
}

.about-main-image {
    width: 100%;
    height: 450px;
    object-fit: cover;
    display: block;
    border-radius: 24px;
}

/* Responsive */
@media (max-width: 1024px) {
    .about-simple-container {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
    
    .about-text-content {
        padding-right: 0;
    }
    
    .about-simple-title {
        font-size: 2.5rem;
    }
}

@media (max-width: 768px) {
    .about-section-simple {
        padding: 4rem 5%;
    }
    
    .about-simple-title {
        font-size: 2rem;
    }
    
    .about-simple-desc {
        font-size: 1rem;
    }
    
    .about-main-image {
        height: 350px;
    }
    
    .about-simple-btn {
        width: 100%;
        justify-content: center;
    }
}

/* ===== Modal Tentang Kami - Modern Design ===== */
.about-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    animation: fadeIn 0.3s ease;
}

.about-modal.active {
    display: flex;
    align-items: center;
    justify-content: center;
}

.about-modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(15, 23, 42, 0.95);
    backdrop-filter: blur(8px);
}

.about-modal-content {
    position: relative;
    max-width: 900px;
    width: 92%;
    max-height: 90vh;
    background: #ffffff;
    border-radius: 32px;
    overflow: hidden;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.6);
    animation: slideUp 0.4s ease;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(50px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* Modal Header */
.about-modal-header {
    background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    padding: 3rem 2.5rem 2rem;
    text-align: center;
    position: relative;
}

.about-modal-icon {
    width: 80px;
    height: 80px;
    background: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: #1e3a8a;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.about-modal-title {
    font-size: 2rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 0.5rem;
    font-family: 'Playfair Display', serif;
}

.about-modal-subtitle {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 400;
}

.about-modal-close {
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    width: 48px;
    height: 48px;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 50%;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 10;
}

.about-modal-close:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: rotate(90deg);
}

/* Modal Body */
.about-modal-body {
    padding: 2.5rem;
    max-height: calc(90vh - 250px);
    overflow-y: auto;
    background: #ffffff;
}

.about-modal-body::-webkit-scrollbar {
    width: 8px;
}

.about-modal-body::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}

.about-modal-body::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

.about-modal-body::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

.about-modal-tab-content {
    display: none;
}

.about-modal-tab-content.active {
    display: block;
    animation: fadeIn 0.4s ease;
}

/* Content Sections */
.modal-section {
    margin-bottom: 2.5rem;
}

.modal-section:last-child {
    margin-bottom: 0;
}

.modal-section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e3a8a;
    margin-bottom: 1.5rem;
    padding-left: 1rem;
    border-left: 4px solid #3b82f6;
    font-family: 'Playfair Display', serif;
}

.modal-section-content {
    color: #475569;
    font-size: 1rem;
    line-height: 1.8;
}

/* List Items with Checkmarks */
.modal-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.modal-list-item {
    display: flex;
    gap: 1rem;
    padding: 1rem 1.25rem;
    background: #f8fafc;
    border-radius: 12px;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.modal-list-item:hover {
    background: #eff6ff;
    transform: translateX(5px);
}

.modal-list-icon {
    flex-shrink: 0;
    width: 28px;
    height: 28px;
    background: #1e3a8a;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 14px;
}

.modal-list-text {
    flex: 1;
    color: #475569;
    line-height: 1.6;
}

/* Quote Box */
.modal-quote {
    background: #eff6ff;
    border-left: 4px solid #3b82f6;
    padding: 1.5rem 2rem;
    border-radius: 12px;
    margin-top: 2rem;
}

.modal-quote-text {
    font-size: 1.05rem;
    font-style: italic;
    color: #1e3a8a;
    line-height: 1.7;
}

/* Responsive */
@media (max-width: 768px) {
    .about-modal-content {
        max-width: 95%;
        max-height: 95vh;
        border-radius: 24px;
    }
    
    .about-modal-header {
        padding: 2.5rem 1.5rem 1.5rem;
    }
    
    .about-modal-icon {
        width: 70px;
        height: 70px;
    }
    
    .about-modal-title {
        font-size: 1.5rem;
    }
    
    .about-modal-body {
        padding: 1.5rem;
    }
    
    .modal-section-title {
        font-size: 1.25rem;
    }
}


.about-container-new {
    max-width: 1200px;
    margin: 0 auto;
}

.about-title-new {
    font-family: 'Poppins', 'Inter', sans-serif;
    font-size: 2.75rem;
    font-weight: 700;
    text-align: center;
    letter-spacing: -0.8px;
    margin-bottom: 0.5rem;
    color: #ffffff;
}

.about-subtitle {
    text-align: center;
    font-size: 1.1rem;
    color: #7DA0CA;
    margin-bottom: 3rem;
    font-weight: 500;
}

/* Tab Navigation */
.about-tabs {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
}

.about-tab-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.9rem 2rem;
    background: rgba(2, 16, 36, 0.6);
    border: 2px solid rgba(84, 131, 179, 0.3);
    border-radius: 50px;
    color: #cbd5e1;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.about-tab-btn svg {
    transition: transform 0.3s ease;
}

.about-tab-btn:hover {
    background: rgba(84, 131, 179, 0.2);
    border-color: rgba(125, 160, 202, 0.6);
    color: #ffffff;
    transform: translateY(-2px);
}

.about-tab-btn:hover svg {
    transform: scale(1.1);
}

.about-tab-btn.active {
    background: linear-gradient(135deg, #22d3ee, #06b6d4);
    border-color: #06b6d4;
    color: #ffffff;
    box-shadow: 0 8px 24px rgba(34, 211, 238, 0.5);
}

/* Tab Content */
.about-content-wrapper {
    position: relative;
}

.about-tab-content {
    display: none;
    animation: fadeInUp 0.5s ease;
}

.about-tab-content.active {
    display: block;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Split Layout - Image Left, Text Right */
.about-split-layout {
    display: grid;
    grid-template-columns: 45% 55%;
    gap: 0;
    min-height: 500px;
    align-items: center;
}

.about-image-side {
    position: relative;
    height: 100%;
    min-height: 500px;
    overflow: hidden;
    border-radius: 24px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
}

.about-split-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
    border-radius: 24px;
}

.about-split-layout:hover .about-split-image {
    transform: scale(1.05);
}

.about-text-side {
    padding: 3rem 4rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.about-badge-tag {
    display: inline-block;
    padding: 0.5rem 1.25rem;
    background: linear-gradient(135deg, #22d3ee, #06b6d4);
    color: white;
    border-radius: 50px;
    font-size: 0.875rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 1.5rem;
    width: fit-content;
    box-shadow: 0 4px 12px rgba(34, 211, 238, 0.5);
}

.about-split-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    font-family: 'Outfit', 'Inter', sans-serif;
}

.about-split-text {
    font-size: 1.05rem;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.8;
    white-space: pre-line;
    margin-bottom: 2rem;
}

.about-learn-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.9rem 2rem;
    background: transparent;
    border: 2px solid #5483B3;
    border-radius: 50px;
    color: #5483B3;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    width: fit-content;
}

.about-learn-btn:hover {
    background: linear-gradient(135deg, #5483B3, #7DA0CA);
    border-color: #7DA0CA;
    color: white;
    transform: translateX(5px);
    box-shadow: 0 8px 24px rgba(84, 131, 179, 0.4);
}

.about-learn-btn svg {
    transition: transform 0.3s ease;
}

.about-learn-btn:hover svg {
    transform: translateX(5px);
}

.tab-pane ul li {
    margin-bottom: 0.5rem;
}

.img-fluid {
    border-radius: 12px;
    border: 1px solid #334155;
}

.row {
    margin-left: 0;
    margin-right: 0;
    width: 100%;
}

.col-md-6 {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
    box-sizing: border-box;
}

.text-center {
    text-align: center;
}

.justify-content-center {
    justify-content: center;
}

.align-items-center {
    align-items: center;
}

.mb-3 {
    margin-bottom: 1rem;
}

.mb-4 {
    margin-bottom: 1.5rem;
}

/* Responsive */
@media (max-width: 1024px) {
    .galaxy-hero {
        flex-direction: column;
        padding: 3rem 3%;
        text-align: center;
    }

    .hero-content {
        text-align: center;
        max-width: 100%;
    }

    .hero-buttons {
        justify-content: center;
    }

    .hero-stats {
        justify-content: center;
    }

    .hero-visual {
        margin-top: 3rem;
    }

    .hero-card {
        width: 350px;
        height: 350px;
        padding: 2rem;
    }

    .hero-icon {
        width: 140px;
        height: 140px;
    }

    .hero-icon-text {
        font-size: 3rem;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }

    .hero-subtitle {
        font-size: 1rem;
    }

    .hero-buttons {
        flex-direction: column;
        width: 100%;
    }

    .btn-primary,
    .btn-secondary {
        width: 100%;
        justify-content: center;
    }

    .hero-stats {
        flex-direction: column;
        gap: 1rem;
    }

    .user-gallery-container,
    .about-container {
        padding: 2rem 1.5rem;
        margin: 2rem 1rem;
    }

    .user-gallery-row {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .nav-tabs .nav-link {
        padding: 0.6rem 1rem;
        font-size: 0.9rem;
    }

    /* Jurusan Cards Responsive - Tablet */
    .jurusan-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .jurusan-title {
        font-size: 2rem;
    }
}

@media (max-width: 480px) {
    .galaxy-hero {
        padding: 2rem 5%;
    }

    .hero-content {
        padding: 1rem 0;
    }

    .btn-primary,
    .btn-secondary {
        padding: 0.9rem 1.5rem;
        font-size: 0.9rem;
    }

    .user-gallery-title,
    .about-title {
        font-size: 1.5rem;
    }
    
    /* Modal Responsive - NEW */
    .news-modal-content {
        width: 95%;
        margin: 3% auto;
        max-height: 95vh;
        border-radius: 16px;
    }
    
    .news-modal-close-btn {
        width: 38px;
        height: 38px;
        right: 15px;
        top: 15px;
    }
    
    .news-modal-image-wrapper {
        height: 250px;
    }
    
    .news-modal-badge-container {
        left: 20px;
        right: 20px;
        bottom: 15px;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.75rem;
    }
    
    .news-modal-badge-new,
    .news-modal-date-new {
        font-size: 0.7rem;
        padding: 0.5rem 1rem;
    }
    
    .news-modal-body-new {
        padding: 2rem 1.5rem 1.5rem;
    }
    
    .news-modal-title-new {
        font-size: 1.5rem;
    }
    
    .news-modal-content-text {
        font-size: 0.95rem;
    }
    
    .news-modal-footer-new {
        padding: 1.25rem 1.5rem;
        flex-direction: column;
        gap: 1rem;
    }
    
    .news-modal-info-item {
        min-width: 100%;
    }

    .user-gallery-row {
        gap: 1rem;
    }

    .card-footer-dates {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }

    /* Jurusan Cards Responsive - Mobile */
    .jurusan-section {
        padding: 0 5% 2rem 5%;
        margin-top: 0;
        padding-top: 3rem;
    }
    
    .jurusan-container {
        margin-top: -120px;
    }

    .jurusan-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .jurusan-title {
        font-size: 1.75rem;
        margin-bottom: 2rem;
    }

    .jurusan-card {
        padding: 1.75rem 1.25rem;
    }

    .jurusan-card-title {
        font-size: 1.5rem;
    }

    .jurusan-icon {
        width: 70px;
        height: 70px;
    }

    .jurusan-icon svg {
        width: 40px;
        height: 40px;
    }

    /* About Section Responsive - Mobile */
    .about-section {
        padding: 3rem 5%;
    }

    .about-title-new {
        font-size: 1.75rem;
    }

    .about-subtitle {
        font-size: 0.95rem;
        margin-bottom: 2rem;
    }

    .about-tabs {
        flex-direction: column;
        gap: 0.75rem;
    }

    .about-tab-btn {
        width: 100%;
        justify-content: center;
        padding: 0.8rem 1.5rem;
        font-size: 0.95rem;
    }

    .about-split-layout {
        grid-template-columns: 1fr;
        min-height: auto;
    }

    .about-image-side {
        min-height: 300px;
        order: 1;
    }

    .about-text-side {
        padding: 2rem 1.5rem;
        order: 2;
    }

    .about-split-title {
        font-size: 1.75rem;
    }

    .about-split-text {
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
    }

    .about-learn-btn {
        padding: 0.8rem 1.75rem;
        font-size: 0.95rem;
    }

    /* About Simple Section - Mobile */
    .about-simple-icon {
        width: 80px;
        height: 80px;
    }

    .about-simple-title {
        font-size: 2rem;
    }

    .about-simple-desc {
        font-size: 1rem;
    }

    .about-simple-btn {
        padding: 0.9rem 2rem;
        font-size: 1rem;
    }

    /* Modal - Mobile */
    .about-modal-content {
        margin: 1rem;
        max-height: 95vh;
    }

    .about-modal-title {
        font-size: 1.5rem;
        padding: 1.5rem 1rem 0.75rem;
    }

    .about-modal-tabs {
        flex-direction: column;
        gap: 0.5rem;
        padding: 0 1rem 1rem;
    }

    .about-modal-tab {
        width: 100%;
        justify-content: center;
    }

    .about-modal-body {
        padding: 1.5rem;
    }

    .about-modal-img {
        max-height: 250px;
    }

    .about-modal-body h3 {
        font-size: 1.5rem;
    }

    .about-modal-body p {
        font-size: 0.95rem;
    }
}
/* ===== THEME UPGRADE (Palette + Futuristic) ===== */
:root{
    --c1:#021024; /* Deep Night */
    --c2:#052659; /* Navy */
    --c3:#5483B3; /* Steel Blue */
    --c4:#7DA0CA; /* Sky */
    --c5:#C1E8FF; /* Ice */
}

body{
    background: #4f7cff;
    color:#ffffff;
}

.hero-title{font-family:'Outfit','Inter',system-ui,sans-serif;letter-spacing:.5px;background:linear-gradient(90deg,var(--c5),#fff);-webkit-background-clip:text;background-clip:text;color:transparent;}
.hero-subtitle{color:rgba(227,239,255,.85);}
.logo-orb{width:96px;height:96px;margin:0 auto 1.25rem;position:relative;border-radius:999px;background:radial-gradient(circle at 30% 30%,var(--c5),var(--c3));box-shadow:0 12px 40px rgba(193,232,255,.35),inset 0 0 30px rgba(193,232,255,.35);display:grid;place-items:center;color:#021024;font-weight:800;font-family:'Outfit',sans-serif;letter-spacing:1px;}
.logo-orb::after{content:"";position:absolute;inset:-6px;border-radius:inherit;padding:2px;background:linear-gradient(135deg,rgba(193,232,255,.8),rgba(84,131,179,.2));-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude;}

.chip-row{display:flex;flex-wrap:wrap;gap:.6rem;justify-content:center;margin-top:1.25rem;}
.chip{color:#021024;background:var(--c5);border-radius:999px;padding:.45rem .9rem;font-weight:600;font-size:.85rem;box-shadow:0 6px 18px rgba(193,232,255,.35);} 
.btn-primary{background:linear-gradient(90deg,var(--c3),var(--c5));color:#021024;border-radius:12px;box-shadow:0 10px 24px rgba(84,131,179,.35);} 
.btn-primary:hover{background:linear-gradient(90deg,var(--c4),var(--c5));color:#021024;}

/* Featured Gallery: make items flat (no card styling) - REMOVED OLD STYLING */ 

.about-container{background:rgba(2,16,36,.45);border:1px solid rgba(193,232,255,.18);backdrop-filter:blur(8px);} 
.about-title{font-family:'Outfit','Inter',sans-serif;} 
.nav-tabs .nav-link{color:#BFD5EA;} 
.nav-tabs .nav-link:hover{color:var(--c5);background:rgba(193,232,255,.08);} 
.nav-tabs .nav-link.active{background:linear-gradient(90deg,var(--c3),var(--c5));color:#021024;border-color:transparent;}

/* Section Focus Effect */
div[id] {
    transition: all 0.4s ease;
}

div[id]:target {
    animation: sectionFocus 0.8s ease;
}

@keyframes sectionFocus {
    0% {
        transform: scale(0.98);
        opacity: 0.7;
    }
    50% {
        transform: scale(1.01);
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}
</style>

<div id="home">
<!-- ===== Hero Section ===== -->
<div class="galaxy-hero">
    <div class="hero-content">
        <div class="hero-welcome">Selamat Datang di Shrewsbury International School</div>
        <h1 class="hero-title">
            Jika hati benar, semuanya akan baik-baik saja. Bersama Kita Berkembang
        </h1>
        <p class="hero-subtitle">
            Menyusuri perjalanan sekolah penuh keajaiban, tempat di mana ilmu pengetahuan, seni, dan teknologi dipelajari dengan dedikasi tinggi.
        </p>
        <div class="hero-buttons">
            <a href="#tentang" class="btn-primary">
                <span>Tentang Kami</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
            <a href="#galeri" class="btn-secondary">
                <span>Galeri Sekolah</span>
            </a>
        </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="wave-divider">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
</div>
</div>

<!-- ===== Jurusan Cards Section ===== -->
<div class="jurusan-section">
    <div class="jurusan-container">
        <div class="jurusan-grid">
            <!-- PPLG Card -->
            <div class="jurusan-card">
                <div class="jurusan-icon">
                    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                        <line x1="8" y1="21" x2="16" y2="21"/>
                        <line x1="12" y1="17" x2="12" y2="21"/>
                        <polyline points="7 10 12 14 17 10"/>
                    </svg>
                </div>
                <h3 class="jurusan-card-title">PPLG</h3>
                <p class="jurusan-card-subtitle">Pengembangan Perangkat Lunak dan Gim</p>
                <p class="jurusan-card-desc">Mempelajari pemrograman, pengembangan aplikasi, web development, dan game development dengan teknologi terkini.</p>
            </div>

            <!-- TJKT Card -->
            <div class="jurusan-card">
                <div class="jurusan-icon">
                    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                        <path d="M2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <h3 class="jurusan-card-title">TJKT</h3>
                <p class="jurusan-card-subtitle">Teknik Jaringan Komputer dan Telekomunikasi</p>
                <p class="jurusan-card-desc">Menguasai instalasi, konfigurasi jaringan komputer, server administration, dan sistem telekomunikasi modern.</p>
            </div>

            <!-- TP Card -->
            <div class="jurusan-card">
                <div class="jurusan-icon">
                    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                </div>
                <h3 class="jurusan-card-title">TPFL</h3>
                <p class="jurusan-card-subtitle">Teknik Pengelasan Fabrikasi Logam</p>
                <p class="jurusan-card-desc">Mempelajari teknik pengelasan, fabrikasi logam, dan konstruksi dengan standar industri internasional.</p>
            </div>

            <!-- TO Card -->
            <div class="jurusan-card">
                <div class="jurusan-icon">
                    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 1v6m0 6v6M5.6 5.6l4.2 4.2m4.2 4.2l4.2 4.2M1 12h6m6 0h6M5.6 18.4l4.2-4.2m4.2-4.2l4.2-4.2"/>
                    </svg>
                </div>
                <h3 class="jurusan-card-title">TKRO</h3>
                <p class="jurusan-card-subtitle">Teknik Kendaraan Ringan Otomotif</p>
                <p class="jurusan-card-desc">Menguasai perawatan, perbaikan kendaraan, sistem mesin, kelistrikan, dan teknologi otomotif terbaru.</p>
            </div>
        </div>
    </div>
</div>
</div>

<!-- ===== Tentang Kami Section (Modern Layout) ===== -->
<div id="tentang" class="about-section-simple">
    <div class="about-simple-container">
        <!-- Text Side -->
        <div class="about-text-content">
            <div class="about-simple-subtitle">Tentang Kami</div>
            <h2 class="about-simple-title">
                Shrewsbury <span>International School</span>
            </h2>
            <p class="about-simple-desc">
                <strong>Shrewsbury International School</strong> adalah sekolah kejuruan terdepan yang berkomitmen menghasilkan lulusan berkualitas tinggi dengan berbagai program keahlian modern.
                <br><br>
                Kami bermitra dengan para pionir industri untuk memberikan produk dan layanan berkualitas tinggi dengan biaya yang terjangkau. Kami percaya bahwa "Pengalaman berbicara untuk dirinya sendiri" dan kami berkomitmen pada keunggulan dalam layanan pelanggan.
            </p>
            <a href="{{ route('user.tentangkami') }}" class="about-simple-btn">
                <span>Lihat Lebih Detail</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
        
        <!-- Image Side -->
        <div class="about-image-content">
            <div class="about-image-wrapper">
                <img src="{{ asset('images/c1_2214447_211125150827.jpg') }}" alt="Shrewsbury School Building" class="about-main-image">
            </div>
        </div>
    </div>
</div>


<!-- ===== Gallery Section ===== -->
<!-- Gallery Header Section - White Background -->
<div class="gallery-header-band">
<div id="galeri" class="user-gallery-container">
    <h2 class="user-gallery-title">Galeri Unggulan</h2>
    <p class="user-gallery-subtitle">Foto-foto terpilih dari berbagai kegiatan sekolah</p>
    
    <!-- Search Box Galeri -->
    <div style="max-width: 600px; margin: 0 auto 2rem;">
        <div style="position: relative;">
            <input 
                type="text" 
                id="gallerySearchInput" 
                placeholder="Cari kategori: Fasilitas, Ekstrakurikuler, Lab PPLG, Lab TJKT, Bengkel TKRO, Bengkel TPFL..." 
                style="width: 100%; padding: 1rem 3rem 1rem 1.25rem; border: 2px solid rgba(17, 24, 39, 0.15); border-radius: 50px; background: #ffffff; color: #111827; font-size: 0.95rem; outline: none; transition: all 0.3s;"
                onfocus="this.style.borderColor='#3b82f6'; this.style.background='#ffffff';"
                onblur="this.style.borderColor='rgba(17, 24, 39, 0.15)'; this.style.background='#ffffff';"
            >
            <button 
                id="clearGallerySearch" 
                style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: transparent; border: none; color: #9ca3af; cursor: pointer; display: none; padding: 0.5rem; transition: color 0.3s;"
                onmouseover="this.style.color='#ef4444'"
                onmouseout="this.style.color='#9ca3af'"
            >
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="15" y1="9" x2="9" y2="15"/>
                    <line x1="9" y1="9" x2="15" y2="15"/>
                </svg>
            </button>
        </div>
        <div id="gallerySearchInfo" style="text-align: center; margin-top: 0.75rem; color: #6b7280; font-size: 0.875rem; display: none;">
            <span id="gallerySearchCount"></span>
        </div>
    </div>
</div>
</div>

<!-- Gallery Cards Section - Blue Background -->
<div class="gallery-cards-band">
<div class="user-gallery-container">
    <div class="user-gallery-row">  
        @forelse($featuredGalleries as $gallery)
            <div class="user-gallery-card">
                <div class="image-wrapper">
                    <img src="{{ asset('storage/'.$gallery->cover_image) }}" alt="{{ $gallery->title }}">
                </div>
                <div class="card-body">
                    <div class="card-title">{{ $gallery->title }}</div>
                    <div class="card-text">{{ Str::limit($gallery->description, 100, '...') }}</div>
                    <div>
                        <span class="category-badge">{{ $gallery->category->name ?? 'UMUM' }}</span>
                    </div>
                </div>
                <a class="gallery-detail-btn" onclick="window.location.href='{{ url('/galeri/'.$gallery->id) }}'">Lihat Detail</a>
                <div class="card-footer-dates">
                    <div class="date-item">
                        <span class="date-label">Created</span>
                        <span class="date-value">{{ $gallery->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="date-item">
                        <span class="date-label">Updated</span>
                        <span class="date-value">{{ $gallery->updated_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="user-gallery-empty text-center">
                🌟 Belum ada galeri unggulan tersedia
            </div>
        @endforelse
    </div>

    {{-- Tombol Lihat Semua Galeri --}}
    <div style="margin-top: 2rem; text-align: center;">
        <a href="{{ route('user.gallery') }}" class="btn-lihat-semua-galeri">
            <span style="display:inline-flex; align-items:center; gap:0.5rem;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="14" rx="2" ry="2"/>
                    <circle cx="8" cy="9" r="1.5"/>
                    <path d="M13 8h6M13 12h6M8 12h.01"/>
                </svg>
                <span>Lihat Semua Galeri</span>
            </span>
        </a>
    </div>

</div>
</div>

<!-- ===== Berita Terkini Section ===== -->
<!-- News Header Section - White Background -->
<div class="gallery-header-band">
    <div id="berita" class="user-gallery-container">
        <div style="display:flex; justify-content:space-between; align-items:center; gap:1rem;">
            <h2 class="user-gallery-title" style="margin-bottom:0;">Berita Terkini</h2>
            <a href="{{ route('user.news.index') }}" class="news-see-all-btn">Lihat Semua Berita</a>
        </div>
    </div>
</div>

<!-- News Cards Section - Blue Background -->
<div class="gallery-cards-band news-section">
<div class="user-gallery-container">
    <div class="user-gallery-row">
        <div id="news-loading">Memuat berita...</div>
        @forelse($news as $item)
            <a href="{{ route('user.news.show', $item->id) }}" class="news-card">
                <div class="news-thumb">
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}">
                    @else
                        <img src="{{ asset('images/default-news.jpg') }}" alt="{{ $item->title }}">
                    @endif
                    <span class="news-category-badge">BERITA</span>
                </div>
                <div class="news-card-body">
                    <div class="news-meta">
                        <i class="far fa-calendar-alt"></i>
                        <span>
                            @if($item->published_date)
                                {{ $item->published_date->format('d M Y') }}
                            @elseif($item->created_at)
                                {{ $item->created_at->format('d M Y') }}
                            @else
                                -
                            @endif
                        </span>
                    </div>
                    <div class="news-card-title">{{ $item->title }}</div>
                    <div class="news-card-excerpt">{{ Str::limit(strip_tags($item->content), 160, '...') }}</div>
                    <span class="news-readmore-btn">
                        Lihat Selengkapnya
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </div>
            </a>
        @empty
            <div class="user-gallery-empty text-center">📰 Belum ada berita tersedia</div>
        @endforelse
    </div>
</div>
</div>

@endsection

<script>
// ===== GALLERY SEARCH FILTER =====
document.addEventListener('DOMContentLoaded', function() {
    const gallerySearchInput = document.getElementById('gallerySearchInput');
    const clearSearchBtn = document.getElementById('clearGallerySearch');
    const searchInfo = document.getElementById('gallerySearchInfo');
    const searchCount = document.getElementById('gallerySearchCount');
    const galleryCards = document.querySelectorAll('.user-gallery-card');
    
    // Mapping kategori untuk pencarian yang lebih fleksibel
    const categoryMapping = {
        'fasilitas': 'Fasilitas',
        'ekstrakurikuler': 'Ekstrakulikuler',
        'ekstrakulikuler': 'Ekstrakulikuler',
        'ekskul': 'Ekstrakulikuler',
        'lab pplg': 'Lab PPLG',
        'laboratorium pplg': 'Lab PPLG',
        'pplg': 'Lab PPLG',
        'lab tjkt': 'Lab TJKT',
        'laboratorium tjkt': 'Lab TJKT',
        'tjkt': 'Lab TJKT',
        'bengkel tkro': 'Bengkel TKRO',
        'tkro': 'Bengkel TKRO',
        'bengkel tpfl': 'Bengkel TPFL',
        'tpfl': 'Bengkel TPFL'
    };
    
    function filterGallery() {
        const searchTerm = gallerySearchInput.value.toLowerCase().trim();
        
        // Tampilkan/sembunyikan tombol clear
        clearSearchBtn.style.display = searchTerm ? 'block' : 'none';
        
        if (!searchTerm) {
            // Tampilkan semua galeri
            galleryCards.forEach(card => {
                card.style.display = 'block';
            });
            searchInfo.style.display = 'none';
            return;
        }
        
        // Cari kategori yang cocok
        let targetCategory = null;
        for (const [keyword, category] of Object.entries(categoryMapping)) {
            if (searchTerm.includes(keyword) || keyword.includes(searchTerm)) {
                targetCategory = category;
                break;
            }
        }
        
        let visibleCount = 0;
        
        galleryCards.forEach(card => {
            const categoryBadge = card.querySelector('.category-badge');
            const cardCategory = categoryBadge ? categoryBadge.textContent.trim() : '';
            
            if (targetCategory) {
                // Filter berdasarkan kategori yang cocok
                if (cardCategory === targetCategory) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            } else {
                // Jika tidak ada kategori yang cocok, coba cari di judul atau deskripsi
                const title = card.querySelector('.card-title')?.textContent.toLowerCase() || '';
                const desc = card.querySelector('.card-text')?.textContent.toLowerCase() || '';
                
                if (title.includes(searchTerm) || desc.includes(searchTerm) || cardCategory.toLowerCase().includes(searchTerm)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            }
        });
        
        // Tampilkan info hasil pencarian
        if (targetCategory) {
            searchCount.textContent = `🔍 Menampilkan ${visibleCount} galeri kategori "${targetCategory}"`;
        } else {
            searchCount.textContent = visibleCount > 0 
                ? `🔍 Ditemukan ${visibleCount} galeri` 
                : '❌ Tidak ada galeri yang cocok. Coba: Fasilitas, Ekstrakurikuler, Lab PPLG, Lab TJKT, Bengkel TKRO, Bengkel TPFL';
        }
        searchInfo.style.display = 'block';
    }
    
    // Event listener untuk input search
    if (gallerySearchInput) {
        gallerySearchInput.addEventListener('input', filterGallery);
        gallerySearchInput.addEventListener('keyup', function(e) {
            if (e.key === 'Escape') {
                gallerySearchInput.value = '';
                filterGallery();
            }
        });
    }
    
    // Event listener untuk tombol clear
    if (clearSearchBtn) {
        clearSearchBtn.addEventListener('click', function() {
            gallerySearchInput.value = '';
            filterGallery();
            gallerySearchInput.focus();
        });
    }
});

// Sembunyikan loading state berita setelah DOM siap
document.addEventListener('DOMContentLoaded', function () {
	const newsLoading = document.getElementById('news-loading');
	if (newsLoading) {
		newsLoading.style.display = 'none';
	}
});
</script>