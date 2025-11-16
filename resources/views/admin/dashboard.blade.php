@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/dashboard-futuristic.css') }}">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Inter', sans-serif;
        color: #EAEAEA;
    }

    /* ==================== CONTAINER ==================== */
    .container {
        position: relative;
        z-index: 2;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0;
    }

    /* ==================== HEADER SECTION ==================== */
    .gallery-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
        padding: 2rem;
        background: #ffffff;
        backdrop-filter: none;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        position: relative;
        overflow: hidden;
    }

    .gallery-header h1 {
        font-size: 1.75rem;
        font-weight: 700;
        margin: 0;
        letter-spacing: 0;
        font-family: 'Inter', sans-serif;
        color: #1e293b;
    }

    .stats-bar {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 1.5rem;
        position: relative;
        z-index: 1;
        width: 100%;
    }

    .stat-item {
        text-align: left;
        padding: 1.5rem;
        background: #2563eb;
        border-radius: 16px;
        border: none;
        backdrop-filter: none;
        transition: all 0.3s;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .stat-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
    }

    .stat-number {
        display: block;
        font-size: 2.5rem;
        font-weight: 700;
        color: #ffffff;
        font-family: 'Inter', sans-serif;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.9);
        text-transform: uppercase;
        letter-spacing: 1.2px;
        font-weight: 600;
    }

    /* ==================== CARD GRID ==================== */
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    /* ==================== GALLERY CARDS ==================== */
    .card {
        background: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        display: flex;
        flex-direction: column;
        transition: all 0.3s;
        position: relative;
        backdrop-filter: none;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 24px rgba(37, 99, 235, 0.2);
        border-color: #2563eb;
    }

    .card-image {
        position: relative;
        height: 200px;
        overflow: hidden;
        background: #334155;
    }

    .card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.3s ease;
    }

    .card:hover img {
        transform: scale(1.05);
    }

    .card-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: #2563eb;
        color: #ffffff;
        padding: 0.4rem 0.8rem;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 2;
    }

    .no-image-placeholder {
        height: 200px;
        background: #334155;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 3rem;
        position: relative;
        overflow: hidden;
    }

    .card-body {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        flex-grow: 1;
        position: relative;
    }

    .card-title {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
        line-height: 1.4;
    }

    .card-description {
        margin: 0;
        font-size: 0.9rem;
        color: #64748b;
        line-height: 1.6;
        flex-grow: 1;
    }

    .card-footer {
        padding: 1rem 1.5rem;
        background: #f8fafc;
        border-top: 1px solid #e2e8f0;
        font-size: 0.8rem;
        color: #64748b;
        font-family: 'Inter', sans-serif;
    }

    .footer-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .footer-item:last-child {
        margin-bottom: 0;
    }

    .footer-label {
        color: #64748b;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 1px;
        font-weight: 600;
    }

    .footer-value {
        color: #2563eb;
        font-weight: 500;
    }

    /* ==================== SECTION DIVIDER ==================== */
    .section-divider {
        margin: 3rem 0;
        text-align: center;
        position: relative;
    }

    .section-divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #334155;
        z-index: 1;
    }

    .section-divider-text {
        background: #1e293b;
        padding: 0.75rem 2rem;
        border-radius: 10px;
        border: 1px solid #334155;
        color: #3b82f6;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        z-index: 2;
        display: inline-block;
        font-size: 0.9rem;
    }

    /* ==================== INFO CARDS ==================== */
    .info-card {
        background: #1e293b;
        border-radius: 12px;
        border: 1px solid #334155;
        box-shadow: none;
        display: flex;
        flex-direction: column;
        transition: all 0.2s;
        position: relative;
        backdrop-filter: none;
        overflow: hidden;
    }

    .info-card:hover {
        transform: translateY(-4px);
        border-color: #8b5cf6;
    }

    .info-card .card-body {
        background: transparent;
    }

    .info-card .card-title {
        color: #8b5cf6;
    }

    /* ==================== EMPTY STATE ==================== */
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 3rem 2rem;
        color: #64748b;
        font-size: 1rem;
        background: #1e293b;
        border-radius: 12px;
        border: 1px dashed #334155;
        backdrop-filter: none;
    }

    .empty-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1024px) {
        .gallery-header {
            flex-direction: column;
            text-align: center;
            gap: 1.5rem;
        }

        .stats-bar {
            flex-direction: row;
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .container {
            padding: 0;
        }

        .gallery-header {
            padding: 1.5rem;
        }

        .gallery-header h1 {
            font-size: 1.5rem;
        }

        .stats-bar {
            flex-direction: column;
            width: 100%;
            gap: 1rem;
        }

        .stat-item {
            width: 100%;
        }

        .card-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
    }

    /* ==================== PULSE ANIMATION ==================== */
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 4px 20px rgba(239,68,68,0.9), 0 0 0 4px #ffffff;
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 6px 30px rgba(239,68,68,1), 0 0 0 6px #ffffff;
        }
    }
</style>

<div class="dashboard-futuristic">
<div class="container" style="position: relative; z-index: 1; max-width: 1600px; margin: 0 auto; padding: 2rem;">
    
    <!-- Header Greeting -->
    <div class="dashboard-header">
        <div class="greeting">Selamat Datang di Dashboard Admin,</div>
        <h1 class="dashboard-title">{{ auth('admin')->user()->username }}</h1>
    </div>

    <!-- Stats Grid - Glassmorphism Cards -->
    <div class="stats-grid">
        <!-- Total Galleries Card -->
        <a href="{{ route('galleries.index') }}" style="text-decoration:none;">
            <div class="glass-card">
                <div class="neon-glow" style="top: -50px; right: -50px;"></div>
                <div class="stat-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="stat-value">{{ $stats['total_galleries'] }}</div>
                <div class="stat-label">Total Galeri</div>
            </div>
        </a>

        <!-- Total Categories Card -->
        <a href="{{ route('categories.index') }}" style="text-decoration:none;">
            <div class="glass-card">
                <div class="neon-glow" style="top: -50px; right: -50px;"></div>
                <div class="stat-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <div class="stat-value">{{ $stats['total_categories'] }}</div>
                <div class="stat-label">Kategori</div>
            </div>
        </a>

        <!-- Total News Card -->
        <a href="{{ route('news.index') }}" style="text-decoration:none;">
            <div class="glass-card">
                <div class="neon-glow" style="top: -50px; right: -50px;"></div>
                <div class="stat-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <div class="stat-value">{{ $stats['total_news'] }}</div>
                <div class="stat-label">Berita Terkini</div>
            </div>
        </a>

        <!-- Unread Messages Card -->
        <a href="{{ route('contacts.index') }}" style="text-decoration:none;position:relative;display:block;">
            @if($unreadContacts > 0)
                <div style="position:absolute;top:-12px;right:8px;min-width:40px;height:40px;background:#ef4444;border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-size:1rem;font-weight:700;box-shadow:0 4px 20px rgba(239,68,68,0.9),0 0 0 4px #ffffff;z-index:20;padding:0 10px;border:4px solid #ffffff;animation:pulse 2s infinite;">
                    {{ $unreadContacts }}
                </div>
            @endif
            <div class="glass-card" style="position: relative;">
                <div class="neon-glow" style="top: -50px; right: -50px;"></div>
                <div class="stat-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="stat-value">{{ $unreadContacts }}</div>
                <div class="stat-label">Pesan Masuk</div>
            </div>
        </a>
    </div>

    <!-- Aksi Cepat Section -->
    <div style="margin-top: 2rem; margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
            <svg style="width: 24px; height: 24px; color: #1e293b;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
            <h2 style="color: #1e293b; font-size: 1.75rem; font-weight: 700; margin: 0; font-family: 'Poppins', sans-serif; letter-spacing: -0.5px;">Aksi Cepat</h2>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.25rem;">
            <!-- Tambah Foto -->
            <a href="{{ route('galleries.create') }}" style="text-decoration: none;">
                <div style="background: #ffffff; border-radius: 16px; padding: 1.5rem; transition: all 0.3s; border: 1px solid #e2e8f0; cursor: pointer; height: 100%; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);" 
                     onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0, 0, 0, 0.15)'; this.style.borderColor='#3b82f6';" 
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.08)'; this.style.borderColor='#e2e8f0';">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 48px; height: 48px; background: rgba(59, 130, 246, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg style="width: 24px; height: 24px; color: #3b82f6;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="color: #1e293b; font-weight: 600; font-size: 1rem; margin-bottom: 0.25rem;">Tambah Foto</div>
                            <div style="color: #64748b; font-size: 0.8rem;">Upload foto galeri baru</div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Tambah Berita -->
            <a href="{{ route('news.create') }}" style="text-decoration: none;">
                <div style="background: #ffffff; border-radius: 16px; padding: 1.5rem; transition: all 0.3s; border: 1px solid #e2e8f0; cursor: pointer; height: 100%; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);" 
                     onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0, 0, 0, 0.15)'; this.style.borderColor='#3b82f6';" 
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.08)'; this.style.borderColor='#e2e8f0';">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 48px; height: 48px; background: rgba(59, 130, 246, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg style="width: 24px; height: 24px; color: #3b82f6;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="color: #1e293b; font-weight: 600; font-size: 1rem; margin-bottom: 0.25rem;">Tambah Berita</div>
                            <div style="color: #64748b; font-size: 0.8rem;">Buat berita terkini</div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Tambah Kategori -->
            <a href="{{ route('categories.create') }}" style="text-decoration: none;">
                <div style="background: #ffffff; border-radius: 16px; padding: 1.5rem; transition: all 0.3s; border: 1px solid #e2e8f0; cursor: pointer; height: 100%; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);" 
                     onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0, 0, 0, 0.15)'; this.style.borderColor='#3b82f6';" 
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.08)'; this.style.borderColor='#e2e8f0';">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 48px; height: 48px; background: rgba(59, 130, 246, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg style="width: 24px; height: 24px; color: #3b82f6;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="color: #1e293b; font-weight: 600; font-size: 1rem; margin-bottom: 0.25rem;">Tambah Kategori</div>
                            <div style="color: #64748b; font-size: 0.8rem;">Buat kategori baru</div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Tambah Agenda -->
            <a href="{{ route('agendas.create') }}" style="text-decoration: none;">
                <div style="background: #ffffff; border-radius: 16px; padding: 1.5rem; transition: all 0.3s; border: 1px solid #e2e8f0; cursor: pointer; height: 100%; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);" 
                     onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0, 0, 0, 0.15)'; this.style.borderColor='#3b82f6';" 
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.08)'; this.style.borderColor='#e2e8f0';">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 48px; height: 48px; background: rgba(59, 130, 246, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg style="width: 24px; height: 24px; color: #3b82f6;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="color: #1e293b; font-weight: 600; font-size: 1rem; margin-bottom: 0.25rem;">Tambah Agenda</div>
                            <div style="color: #64748b; font-size: 0.8rem;">Buat agenda kegiatan</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Notifikasi Pesan Baru -->
    @if($unreadContacts > 0)
    <div style="background:linear-gradient(135deg,rgba(239,68,68,0.1),rgba(239,68,68,0.05));border:1px solid rgba(239,68,68,0.3);border-radius:12px;padding:1.5rem;margin-bottom:3rem;">
        <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1rem;">
            <div style="width:40px;height:40px;background:#ef4444;border-radius:50%;display:flex;align-items:center;justify-content:center;animation:pulse 2s infinite;">
                <svg style="width:20px;height:20px;color:white;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
            </div>
            <div style="flex:1;">
                <h3 style="color:#f1f5f9;font-size:1.1rem;font-weight:600;margin:0 0 0.25rem 0;">🔔 Anda memiliki {{ $unreadContacts }} pesan baru!</h3>
                <p style="color:#94a3b8;margin:0;font-size:0.9rem;">Klik untuk melihat dan membalas pesan dari pengunjung.</p>
            </div>
            <a href="{{ route('contacts.index') }}" style="background:#ef4444;color:white;padding:0.75rem 1.5rem;border-radius:10px;text-decoration:none;font-weight:600;font-size:0.9rem;transition:all 0.2s;" onmouseover="this.style.background='#dc2626'" onmouseout="this.style.background='#ef4444'">
                Lihat Pesan
            </a>
        </div>
        
        @if($latestContacts->count() > 0)
        <div style="border-top:1px solid rgba(239,68,68,0.2);padding-top:1rem;margin-top:1rem;">
            <div style="color:#94a3b8;font-size:0.8rem;font-weight:600;text-transform:uppercase;margin-bottom:0.75rem;">Pesan Terbaru:</div>
            @foreach($latestContacts as $contact)
            <div style="background:rgba(30,41,59,0.5);border-radius:8px;padding:0.75rem 1rem;margin-bottom:0.5rem;display:flex;justify-content:space-between;align-items:center;">
                <div style="flex:1;">
                    <div style="color:#f1f5f9;font-weight:500;font-size:0.9rem;">{{ $contact->name }}</div>
                    <div style="color:#94a3b8;font-size:0.8rem;">{{ Str::limit($contact->subject, 40) }}</div>
                </div>
                <div style="text-align:right;">
                    <div style="color:#64748b;font-size:0.75rem;">{{ $contact->created_at->diffForHumans() }}</div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
    @endif

    <style>
        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
            }
            50% {
                box-shadow: 0 0 0 10px rgba(239, 68, 68, 0);
            }
        }
    </style>



    <!-- System Information Card - Paling Bawah -->
    <div style="margin-top:3rem;">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <svg style="width: 24px; height: 24px; color: #1e293b;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <h2 style="color:#1e293b;font-size:1.75rem;font-weight:700;margin:0;font-family:'Poppins',sans-serif;letter-spacing:-0.5px;">Informasi Sistem</h2>
            </div>
            <a href="{{ route('system-info.edit') }}" style="background:#3b82f6;color:#fff;padding:0.5rem 1rem;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.9rem;">Edit</a>
        </div>
        <div style="background:#ffffff;border:1px solid #e2e8f0;border-radius:16px;padding:2rem;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1.5rem;">
                <div>
                    <div style="color:#64748b;font-size:0.75rem;margin-bottom:0.4rem;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Nama Sistem:</div>
                    <div style="color:#1e293b;font-size:1.1rem;font-weight:700;font-family:'Poppins',sans-serif;">{{ $systemInfo->system_name }}</div>
                </div>
                <div>
                    <div style="color:#64748b;font-size:0.75rem;margin-bottom:0.4rem;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Versi Sistem:</div>
                    <div style="color:#1e293b;font-size:1.1rem;font-weight:700;font-family:'Poppins',sans-serif;">{{ $systemInfo->system_version }}</div>
                </div>
                <div>
                    <div style="color:#64748b;font-size:0.75rem;margin-bottom:0.4rem;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Framework:</div>
                    <div style="color:#1e293b;font-size:1.1rem;font-weight:700;font-family:'Poppins',sans-serif;">Laravel {{ app()->version() }}</div>
                </div>
                <div>
                    <div style="color:#64748b;font-size:0.75rem;margin-bottom:0.4rem;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">PHP Version:</div>
                    <div style="color:#1e293b;font-size:1.1rem;font-weight:700;font-family:'Poppins',sans-serif;">{{ phpversion() }}</div>
                </div>
                <div>
                    <div style="color:#64748b;font-size:0.75rem;margin-bottom:0.4rem;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Database:</div>
                    <div style="color:#1e293b;font-size:1.1rem;font-weight:700;font-family:'Poppins',sans-serif;">{{ $systemInfo->database_type }}</div>
                </div>
                <div>
                    <div style="color:#64748b;font-size:0.75rem;margin-bottom:0.4rem;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Status:</div>
                    <span style="background:{{ $systemInfo->status == 'aktif' ? 'rgba(34,197,94,0.15)' : 'rgba(251,191,36,0.15)' }};color:{{ $systemInfo->status == 'aktif' ? '#16a34a' : '#f59e0b' }};padding:0.4rem 0.85rem;border-radius:8px;font-size:0.85rem;font-weight:700;display:inline-block;font-family:'Poppins',sans-serif;">
                        {{ $systemInfo->status == 'aktif' ? '✓ Aktif' : '⚠ Maintenance' }}
                    </span>
                </div>
            </div>
            <div style="margin-top:1.5rem;padding-top:1.5rem;border-top:1px solid #e2e8f0;">
                <div style="color:#64748b;font-size:0.75rem;margin-bottom:0.4rem;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Server Time:</div>
                <div style="color:#1e293b;font-size:1rem;font-weight:700;font-family:'Poppins',sans-serif;">{{ now()->format('d M Y, H:i:s') }}</div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection