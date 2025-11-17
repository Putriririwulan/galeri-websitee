@extends('layouts.user.app')

@section('content')
<style>
    .detail-berita-page {
        background: linear-gradient(135deg, #e5edff, #f9fafb);
        min-height: 100vh;
        padding: 3rem 0 3.5rem;
    }

    .detail-berita {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        display: grid;
        grid-template-columns: 0.95fr 1.3fr; /* ~42% / 58% */
        gap: 2.5rem;
        min-height: 70vh;
    }

    .gambar-section {
        position: sticky;
        top: 5rem;
        align-self: flex-start;
        height: calc(100vh - 7rem);
        max-height: 620px;
        border-radius: 1.25rem;
        overflow: hidden;
        background: #020617;
        box-shadow: 0 20px 40px rgba(15, 23, 42, 0.5);
    }

    .gambar-section-inner {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .gambar-section-inner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .gambar-section-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: #e5e7eb;
        background: radial-gradient(circle at top, #1e3a8a, #020617);
        font-size: 0.9rem;
        text-align: center;
        padding: 1.5rem;
    }

    .gambar-section-placeholder i {
        font-size: 2.5rem;
        margin-bottom: 0.75rem;
        color: #60a5fa;
    }

    .konten-section {
        align-self: stretch;
        display: flex;
        flex-direction: column;
    }

    .konten-berita {
        background: #ffffff;
        border-radius: 1.25rem;
        padding: 2.5rem 2.75rem;
        box-shadow: 0 16px 40px rgba(15, 23, 42, 0.16);
        color: #0f172a;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .breadcrumb-berita {
        font-size: 0.85rem;
        color: #6b7280;
        margin-bottom: 0.25rem;
    }

    .breadcrumb-berita a {
        color: #2563eb;
        text-decoration: none;
    }

    .breadcrumb-berita a:hover {
        text-decoration: underline;
    }

    .badge-berita {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.2rem 0.7rem;
        border-radius: 999px;
        background: #1d4ed8;
        color: #eff6ff;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .tanggal-berita {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        font-size: 0.85rem;
        color: #6b7280;
        align-items: center;
    }

    .tanggal-berita span {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
    }

    .tanggal-berita i {
        color: #2563eb;
    }

    .judul-berita {
        font-size: 2.25rem;
        line-height: 1.25;
        font-weight: 800;
        color: #0f172a;
        margin-top: 0.4rem;
    }

    .divider-berita {
        border: none;
        border-top: 1px solid #e5e7eb;
        margin: 0.5rem 0 0.25rem;
    }

    .deskripsi-berita {
        font-size: 0.98rem;
        line-height: 1.9;
        color: #111827;
    }

    .deskripsi-berita p {
        margin-bottom: 1rem;
    }

    .deskripsi-berita p:last-child {
        margin-bottom: 0;
    }

    .metadata-berita {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        font-size: 0.85rem;
        color: #6b7280;
        padding-top: 0.75rem;
        border-top: 1px dashed #e5e7eb;
    }

    .metadata-berita span {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    .metadata-berita i {
        color: #9ca3af;
    }

    .btn-kembali-berita-wrapper {
        margin-top: 1rem;
        display: flex;
        justify-content: flex-start;
    }

    .btn-kembali-berita {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.45rem;
        padding: 0.7rem 1.6rem;
        border-radius: 999px;
        border: none;
        background: #1e3a8a;
        color: #ffffff;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.4);
        transition: background 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-kembali-berita i {
        font-size: 0.9rem;
    }

    .btn-kembali-berita:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
        box-shadow: 0 16px 32px rgba(37, 99, 235, 0.5);
        text-decoration: none;
    }

    @media (max-width: 1024px) {
        .detail-berita {
            grid-template-columns: 1fr 1fr; /* tablet 50-50 */
            padding: 0 1.5rem;
        }

        .gambar-section {
            height: 420px;
            position: sticky;
            top: 4.5rem;
        }

        .judul-berita {
            font-size: 2rem;
        }
    }

    @media (max-width: 768px) {
        .detail-berita-page {
            padding-top: 1.75rem;
        }

        .detail-berita {
            grid-template-columns: 1fr;
            padding: 0 1.25rem;
        }

        .gambar-section {
            position: relative;
            top: 0;
            height: 280px;
            max-height: none;
            margin-bottom: 1.25rem;
        }

        .konten-berita {
            padding: 1.75rem 1.5rem 2rem;
        }

        .judul-berita {
            font-size: 1.6rem;
        }

        .btn-kembali-berita-wrapper {
            justify-content: stretch;
        }

        .btn-kembali-berita {
            width: 100%;
        }
    }
</style>

<div class="detail-berita-page">
    <div class="detail-berita">
        <div class="gambar-section">
            <div class="gambar-section-inner">
                @if($news->image)
                    <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}">
                @else
                    <div class="gambar-section-placeholder">
                        <i class="far fa-image"></i>
                        <div>Tidak ada gambar untuk berita ini.</div>
                    </div>
                @endif
            </div>
        </div>

        <div class="konten-section">
            <div class="konten-berita">
                <nav class="breadcrumb-berita" aria-label="Breadcrumb">
                    <a href="{{ route('user.dashboard') }}">Beranda</a>
                    <span> / </span>
                    <a href="{{ route('user.news.index') }}">Berita Terkini</a>
                    <span> / </span>
                    <span>{{ $news->title }}</span>
                </nav>

                <div>
                    <span class="badge-berita">BERITA</span>
                </div>

                <div class="tanggal-berita">
                    <span>
                        <i class="far fa-calendar-alt"></i>
                        <span>
                            {{ $news->published_date ? $news->published_date->format('d M Y') : ($news->created_at?->format('d M Y') ?? '-') }}
                        </span>
                    </span>
                    <span>
                        <i class="far fa-clock"></i>
                        <span>
                            {{ $news->published_date ? $news->published_date->format('H:i') : ($news->created_at?->format('H:i') ?? '-') }}
                        </span>
                    </span>
                </div>

                <h1 class="judul-berita">{{ $news->title }}</h1>

                <hr class="divider-berita">

                <div class="deskripsi-berita">
                    {!! nl2br(e($news->content)) !!}
                </div>

                <div class="metadata-berita">
                    <span>
                        <i class="far fa-calendar-check"></i>
                        <span>
                            Published:
                            {{ $news->published_date ? $news->published_date->format('d M Y, H:i') : ($news->created_at?->format('d M Y, H:i') ?? '-') }}
                        </span>
                    </span>
                    @if($news->updated_at)
                        <span>
                            <i class="fas fa-sync-alt"></i>
                            <span>Updated: {{ $news->updated_at->format('d M Y, H:i') }}</span>
                        </span>
                    @endif
                </div>

                <div class="btn-kembali-berita-wrapper">
                    <a href="{{ url()->previous() ?? route('user.news.index') }}" class="btn-kembali-berita">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
