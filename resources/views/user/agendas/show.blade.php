@extends('layouts.user.app')

@section('content')
<style>
    body {
        background: #ffffff;
        min-height: 100vh;
    }

    .detail-container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #94a3b8;
        text-decoration: none;
        font-weight: 500;
        margin-bottom: 2rem;
        transition: all 0.3s;
    }

    .back-button:hover {
        color: #1e3a8a;
        transform: translateX(-4px);
    }

    .detail-card {
        background: #ffffff;
        border: 3px solid #1e3a8a;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(30, 58, 138, 0.15);
    }

    .detail-header {
        background: #1e3a8a;
        padding: 2rem 2.5rem;
        text-align: center;
        color: white;
        border-bottom: 3px solid #1e40af;
    }

    .detail-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }

    .detail-meta {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .meta-item svg {
        width: 18px;
        height: 18px;
        opacity: 0.9;
    }

    .detail-body {
        padding: 2rem 2.5rem;
    }

    .section-title {
        font-size: 1rem;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title svg {
        width: 18px;
        height: 18px;
    }

    .description-box {
        background: #f8fafc;
        padding: 1.5rem;
        border-radius: 8px;
        border: 2px solid #1e3a8a;
        border-left: 5px solid #1e3a8a;
        line-height: 1.6;
        color: #374151;
        font-size: 0.95rem;
        margin-bottom: 1.25rem;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.25rem;
        margin-bottom: 1.25rem;
    }

    .info-card {
        background: #f8fafc;
        border: 3px solid #1e3a8a;
        border-radius: 8px;
        padding: 0.875rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        box-shadow: 0 2px 8px rgba(30, 58, 138, 0.1);
    }

    .info-card svg {
        width: 20px;
        height: 20px;
        color: #1e3a8a;
        flex-shrink: 0;
    }

    .info-content {
        flex: 1;
    }

    .info-label {
        font-size: 0.75rem;
        color: #6b7280;
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-value {
        font-size: 0.9rem;
        font-weight: 700;
        color: #1f2937;
    }

    .countdown-section {
        background: #f8fafc;
        border: 3px solid #1e3a8a;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        margin-bottom: 1.25rem;
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.1);
    }

    .countdown-title {
        font-size: 0.9rem;
        color: #1e3a8a;
        margin-bottom: 0.75rem;
        font-weight: 600;
    }

    .countdown-timer {
        display: flex;
        justify-content: center;
        gap: 0.875rem;
        flex-wrap: wrap;
    }

    .countdown-item {
        background: #ffffff;
        border: 3px solid #1e3a8a;
        border-radius: 8px;
        padding: 0.625rem 0.875rem;
        min-width: 65px;
        box-shadow: 0 2px 6px rgba(30, 58, 138, 0.1);
    }

    .countdown-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e3a8a;
        line-height: 1;
        margin-bottom: 0.25rem;
    }

    .countdown-label {
        font-size: 0.7rem;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        padding-top: 1.25rem;
        border-top: 2px solid #1e3a8a;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem 1.25rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
        transition: all 0.3s;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background: #1e3a8a;
        color: white;
    }

    .btn-primary:hover {
        background: #1e40af;
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.4);
        text-decoration: none;
    }

    .btn-secondary {
        background: #ffffff;
        color: #374151;
        border: 2px solid #1e3a8a;
    }

    .btn-secondary:hover {
        background: #f9fafb;
        color: #1f2937;
        transform: translateY(-2px);
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .detail-container {
            padding: 1.5rem 0.75rem;
            max-width: 100%;
        }

        .detail-header {
            padding: 1.5rem 1rem;
        }

        .detail-header h1 {
            font-size: 1.25rem;
        }

        .detail-meta {
            gap: 1rem;
            flex-direction: column;
        }

        .meta-item {
            font-size: 0.85rem;
            justify-content: center;
        }

        .detail-body {
            padding: 1.5rem 1rem;
        }

        .section-title {
            font-size: 0.9rem;
        }

        .description-box {
            padding: 1rem;
            font-size: 0.9rem;
        }

        .info-grid {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }

        .info-card {
            padding: 0.75rem;
        }

        .countdown-section {
            padding: 1rem;
        }

        .countdown-timer {
            gap: 0.5rem;
        }

        .countdown-item {
            padding: 0.5rem 0.625rem;
            min-width: 55px;
        }

        .countdown-number {
            font-size: 1.25rem;
        }

        .countdown-label {
            font-size: 0.65rem;
        }

        .action-buttons {
            flex-direction: column;
            gap: 0.75rem;
        }

        .btn-action {
            width: 100%;
            justify-content: center;
            padding: 0.75rem 1rem;
            font-size: 0.8rem;
        }
    }
</style>

<div class="detail-container">
    <a href="{{ route('user.agendas.index') }}" class="back-button">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
            <path d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali ke Daftar Agenda
    </a>

    <div class="detail-card">
        <div class="detail-header">
            <h1>{{ $agenda->title }}</h1>
            <div class="detail-meta">
                <div class="meta-item">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    {{ $agenda->event_date->format('d F Y') }}
                </div>
                <div class="meta-item">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    {{ \Carbon\Carbon::parse($agenda->event_time)->format('H:i') }} WIB
                </div>
            </div>
        </div>

        <div class="detail-body">
            <div class="countdown-section">
                <div class="countdown-title">Hitung Mundur Acara</div>
                <div class="countdown-timer" id="countdown">
                    <div class="countdown-item">
                        <div class="countdown-number" id="days">0</div>
                        <div class="countdown-label">Hari</div>
                    </div>
                    <div class="countdown-item">
                        <div class="countdown-number" id="hours">0</div>
                        <div class="countdown-label">Jam</div>
                    </div>
                    <div class="countdown-item">
                        <div class="countdown-number" id="minutes">0</div>
                        <div class="countdown-label">Menit</div>
                    </div>
                    <div class="countdown-item">
                        <div class="countdown-number" id="seconds">0</div>
                        <div class="countdown-label">Detik</div>
                    </div>
                </div>
            </div>

            <h2 class="section-title">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Deskripsi Kegiatan
            </h2>
            <div class="description-box">
                {{ $agenda->description }}
            </div>

            <h2 class="section-title">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Informasi Detail
            </h2>
            <div class="info-grid">
                <div class="info-card">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    <div class="info-content">
                        <div class="info-label">Tanggal</div>
                        <div class="info-value">{{ $agenda->event_date->format('d/m/Y') }}</div>
                    </div>
                </div>
                <div class="info-card">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <div class="info-content">
                        <div class="info-label">Waktu</div>
                        <div class="info-value">{{ \Carbon\Carbon::parse($agenda->event_time)->format('H:i') }} WIB</div>
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <a href="{{ route('user.agendas.index') }}" class="btn-action btn-secondary">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                        <path d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
                <a href="{{ route('user.dashboard') }}" class="btn-action btn-primary">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // Countdown Timer
    const eventDate = new Date('{{ $agenda->event_date->format('Y-m-d') }} {{ \Carbon\Carbon::parse($agenda->event_time)->format('H:i:s') }}').getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = eventDate - now;

        if (distance < 0) {
            document.getElementById('countdown').innerHTML = '<div style="font-size: 1rem; color: #1e3a8a; font-weight: 700;">Acara Sedang Berlangsung atau Telah Selesai</div>';
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('days').textContent = days;
        document.getElementById('hours').textContent = hours;
        document.getElementById('minutes').textContent = minutes;
        document.getElementById('seconds').textContent = seconds;
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
</script>
@endsection
