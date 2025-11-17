@extends('layouts.user.app')

@section('content')
<style>
    .search-page-wrapper {
        max-width: 1400px;
        margin: 0 auto;
        padding: 3rem 2rem 4rem;
    }

    .search-header {
        margin-bottom: 2rem;
        border-bottom: 1px solid rgba(148, 163, 184, 0.4);
        padding-bottom: 1rem;
    }

    .search-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #f9fafb;
        margin-bottom: 0.5rem;
    }

    .search-subtitle {
        font-size: 0.95rem;
        color: #9ca3af;
    }

    .search-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1.75rem;
        margin-top: 2rem;
    }

    .search-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 8px 18px rgba(15, 23, 42, 0.25);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
        text-decoration: none;
        color: inherit;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .search-card:hover {
        transform: translateY(-4px) scale(1.01);
        box-shadow: 0 14px 28px rgba(15, 23, 42, 0.35);
        text-decoration: none;
    }

    .search-card-thumb {
        position: relative;
        width: 100%;
        padding-top: 56.25%;
        overflow: hidden;
    }

    .search-card-thumb img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.35s ease;
    }

    .search-card:hover .search-card-thumb img {
        transform: scale(1.05);
    }

    .search-type-badge {
        position: absolute;
        top: 0.75rem;
        left: 0.75rem;
        padding: 0.3rem 0.75rem;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #f9fafb;
        background: linear-gradient(135deg, #1e3a8a, #2563eb);
    }

    .search-card-body {
        padding: 1.25rem 1.35rem 1.4rem;
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
        flex: 1;
    }

    .search-card-meta {
        font-size: 0.8rem;
        color: #6b7280;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .search-card-meta i {
        color: #2563eb;
    }

    .search-card-title {
        font-size: 1rem;
        font-weight: 700;
        color: #111827;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .search-card-excerpt {
        font-size: 0.9rem;
        color: #4b5563;
        line-height: 1.6;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .search-card-footer {
        margin-top: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.8rem;
        color: #6b7280;
    }

    .search-readmore {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        color: #2563eb;
        font-weight: 600;
    }

    .search-readmore i {
        font-size: 0.8rem;
    }

    .search-empty {
        margin-top: 3rem;
        padding: 3rem 2rem;
        border-radius: 16px;
        background: rgba(15, 23, 42, 0.8);
        border: 1px dashed rgba(148, 163, 184, 0.6);
        text-align: center;
        color: #e5e7eb;
    }

    .search-empty-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #60a5fa;
    }

    .search-empty-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .search-empty-text {
        font-size: 0.95rem;
        color: #cbd5f5;
        margin-bottom: 0.75rem;
    }

    .search-suggestions {
        font-size: 0.9rem;
        color: #9ca3af;
    }

    .search-suggestions span {
        background: rgba(37, 99, 235, 0.1);
        border-radius: 999px;
        padding: 0.25rem 0.7rem;
        margin: 0.15rem;
        display: inline-block;
        border: 1px solid rgba(37, 99, 235, 0.4);
    }

    .search-highlight {
        background: #fef9c3;
        padding: 0 0.1rem;
        border-radius: 3px;
    }

    @media (max-width: 1024px) {
        .search-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .search-page-wrapper {
            padding: 2.25rem 1.25rem 3rem;
        }

        .search-grid {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
    }
</style>

@php
    $highlight = function ($text) use ($keyword) {
        if (!$keyword) {
            return e($text);
        }
        $pattern = '/' . preg_quote($keyword, '/') . '/i';
        $escaped = e($text);
        return preg_replace($pattern, '<mark class="search-highlight">$0</mark>', $escaped);
    };
@endphp

<div class="search-page-wrapper">
    <div class="search-header">
        <h1 class="search-title">Hasil Pencarian</h1>
        @if($keyword)
            <p class="search-subtitle">Menampilkan hasil untuk: <strong>"{{ $keyword }}"</strong></p>
        @else
            <p class="search-subtitle">Masukkan kata kunci pada kotak pencarian di navbar.</p>
        @endif
    </div>

    @if($keyword === '')
        <div class="search-empty">
            <div class="search-empty-icon"><i class="fas fa-search"></i></div>
            <div class="search-empty-title">Belum ada kata kunci</div>
            <p class="search-empty-text">Silakan ketik kata kunci di kotak pencarian untuk mencari galeri, berita, atau agenda.</p>
            <div class="search-suggestions">
                Coba kata kunci: <span>berita</span><span>galeri</span><span>agenda</span><span>hubungi kami</span>
            </div>
        </div>
    @elseif($results->isEmpty())
        <div class="search-empty">
            <div class="search-empty-icon"><i class="fas fa-search-minus"></i></div>
            <div class="search-empty-title">Maaf, tidak ada hasil untuk '{{ $keyword }}'</div>
            <p class="search-empty-text">Kami tidak menemukan hasil yang cocok dengan kata kunci tersebut.</p>
            <div class="search-suggestions">
                Coba gunakan kata kunci lain, misalnya:
                <br>
                <span>beranda</span><span>galeri</span><span>agenda</span><span>berita</span><span>hubungi kami</span><span>fasilitas</span><span>ekstrakurikuler</span>
            </div>
        </div>
    @else
        <div class="search-grid">
            @foreach($results as $item)
                <a href="{{ $item['url'] }}" class="search-card">
                    <div class="search-card-thumb">
                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                        <span class="search-type-badge">{{ strtoupper($item['type']) }}</span>
                    </div>
                    <div class="search-card-body">
                        <div class="search-card-meta">
                            @if($item['date'])
                                <span><i class="far fa-calendar-alt"></i> {{ $item['date'] }}</span>
                            @endif
                            @if($item['meta'])
                                <span><i class="far fa-folder"></i> {{ $item['meta'] }}</span>
                            @endif
                        </div>
                        <div class="search-card-title">{!! $highlight($item['title']) !!}</div>
                        <div class="search-card-excerpt">{!! $highlight(\Illuminate\Support\Str::limit(strip_tags($item['excerpt']), 160, '...')) !!}</div>
                        <div class="search-card-footer">
                            <span class="search-readmore">Lihat Selengkapnya <i class="fas fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
