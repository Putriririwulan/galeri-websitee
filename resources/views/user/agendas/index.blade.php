@extends('layouts.user.app')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap');

:root {
    --c1: #021024;
    --c2: #052659;
    --c3: #5483B3;
    --c4: #7DA0CA;
    --c5: #C1E8FF;
}

body {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #2563eb 100%);
    color: #1f2937;
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
}

.agenda-hero {
    background: #ffffff;
    padding: 4rem 0;
    text-align: center;
    margin-bottom: 3rem;
    border-bottom: 3px solid #4f7cff;
}

.agenda-hero h1 {
    font-family: 'Inter', sans-serif;
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
}

.agenda-hero p {
    font-size: 1.1rem;
    color: #6b7280;
    max-width: 600px;
    margin: 0 auto;
}

.agenda-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.agenda-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
    margin-bottom: 3rem;
    align-items: start;
}

.agenda-card {
    background: #ffffff;
    border: 2px solid #e5e7eb;
    border-radius: 16px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 400px;
    width: 100%;
    box-sizing: border-box;
}

.agenda-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: #1e3a8a;
}

.agenda-card:hover {
    transform: translateY(-5px);
    border-color: #1e3a8a;
    box-shadow: 0 10px 25px rgba(30, 58, 138, 0.3);
}

.agenda-date-badge {
    background: #1e3a8a;
    border-radius: 12px;
    padding: 1rem;
    text-align: center;
    margin-bottom: 1.5rem;
    color: #ffffff;
    flex-shrink: 0;
}

.agenda-date-badge .day {
    font-size: 1.75rem;
    font-weight: 800;
    line-height: 1;
}

.agenda-date-badge .month-year {
    font-size: 0.8rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin: 0.25rem 0;
    opacity: 0.9;
}

.agenda-date-badge .time {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    font-size: 0.8rem;
    font-weight: 600;
    margin-top: 0.5rem;
    padding-top: 0.5rem;
    border-top: 1px solid rgba(255,255,255,0.2);
}

.agenda-content {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.agenda-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.75rem;
    line-height: 1.3;
    flex-shrink: 0;
}

.agenda-description {
    color: #6b7280;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 0;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    flex: 1;
    min-height: 0;
}


.agenda-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1.5rem;
    border-top: 1px solid #e5e7eb;
    margin-top: auto;
    flex-shrink: 0;
    min-height: 60px;
}

.agenda-status {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #10b981;
    font-size: 0.85rem;
    font-weight: 600;
}

.btn-detail {
    background: #1e3a8a;
    color: #ffffff;
    padding: 0.5rem 0.75rem;
    border-radius: 8px;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    transition: all 0.3s ease;
}

.btn-detail:hover {
    background: #1e40af;
    transform: translateX(2px);
    color: #ffffff;
    text-decoration: none;
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: #ffffff;
    border: 2px solid #1e3a8a;
    border-radius: 16px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.empty-state h3 {
    font-size: 1.5rem;
    color: #1f2937;
    margin-bottom: 1rem;
}

.empty-state p {
    color: #6b7280;
    font-size: 1rem;
}

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    margin-top: 2rem;
}

.pagination .page-link {
    padding: 0.5rem 1rem;
    background: #ffffff;
    border: 2px solid #e5e7eb;
    color: #374151;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.pagination .page-link:hover,
.pagination .page-link.active {
    background: #1e3a8a;
    border-color: #1e3a8a;
    color: #ffffff;
    text-decoration: none;
}

@media (max-width: 1200px) {
    .agenda-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }
}

@media (max-width: 900px) {
    .agenda-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }
}

@media (max-width: 600px) {
    .agenda-hero h1 {
        font-size: 2rem;
    }

    .agenda-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .agenda-container {
        padding: 0 1rem 3rem;
    }

    .agenda-card {
        padding: 1.25rem;
        height: 380px;
    }

    .agenda-date-badge .day {
        font-size: 1.5rem;
    }

    .agenda-title {
        font-size: 1rem;
    }
}
        font-weight: 500;
    }
    
    .pagination a:hover {
        background: #3b82f6;
        color: white;
        border-color: #3b82f6;
        transform: translateY(-2px);
    }
    
    .pagination .active span {
        background: #3b82f6;
        color: white;
        border-color: #3b82f6;
    }
    
    .pagination .disabled span {
        opacity: 0.5;
        cursor: not-allowed;
    }

    @media (max-width: 768px) {
        .agenda-hero h1 {
            font-size: 2rem;
        }

        .agenda-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .agenda-container {
            padding: 0 1rem 3rem;
        }
    }
</style>

<div class="agenda-hero">
    <div class="container">
        <h1>Agenda Kegiatan</h1>
        <p>Jadwal kegiatan dan acara sekolah yang akan datang</p>
    </div>
</div>

<div class="agenda-container">
    @if($agendas->count() > 0)
        <div class="agenda-grid">
            @foreach($agendas as $agenda)
                <div class="agenda-card">
                    <div class="agenda-date-badge">
                        <div class="day">{{ $agenda->event_date->format('d') }}</div>
                        <div class="month-year">{{ $agenda->event_date->format('F Y') }}</div>
                        <div class="time">
                            <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                            {{ \Carbon\Carbon::parse($agenda->event_time)->format('H:i') }} WIB
                        </div>
                    </div>
                    
                    <div class="agenda-content">
                        <h3 class="agenda-title">{{ $agenda->title }}</h3>
                        <p class="agenda-description">{{ $agenda->description }}</p>
                        
                        <div class="agenda-footer">
                            <span class="agenda-status">
                                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Upcoming
                            </span>
                            <a href="{{ route('user.agendas.show', $agenda->id) }}" class="btn-detail">
                                Lihat Detail
                                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($agendas->hasPages())
            <div class="pagination-wrapper">
                {{ $agendas->links() }}
            </div>
        @endif
    @else
        <div class="empty-state">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            <h3>Belum Ada Agenda</h3>
            <p>Saat ini belum ada agenda kegiatan yang dijadwalkan</p>
        </div>
    @endif
</div>
@endsection
