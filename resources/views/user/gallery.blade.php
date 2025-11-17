@extends('layouts.user.app')

@section('content')
<style>
    .galeri-hero {
        background: #ffffff;
        padding: 3rem 0;
        margin-bottom: 2.5rem;
        border-bottom: 3px solid #4f7cff;
    }

    .galeri-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .galeri-breadcrumb {
        font-size: 0.875rem;
        color: #6b7280;
        margin-bottom: 1rem;
    }

    .galeri-breadcrumb a {
        color: #2563eb;
        text-decoration: none;
    }

    .galeri-breadcrumb a:hover {
        text-decoration: underline;
    }

    .galeri-hero-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: #1f2937;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.5rem;
    }

    .galeri-hero-subtitle {
        font-size: 1rem;
        color: #6b7280;
        max-width: 540px;
    }

    .galeri-grid {
        display: grid;
        gap: 1.75rem;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
    }

    /* Layout variants */
    .galeri-grid.layout-2-cols {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .galeri-grid.layout-3-cols {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .galeri-grid.layout-4-cols {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .galeri-grid.layout-masonry {
        display: block;
        column-count: 3;
        column-gap: 1.75rem;
    }

    .galeri-grid.layout-masonry .galeri-card {
        break-inside: avoid;
        margin-bottom: 1.75rem;
    }

    .galeri-grid.layout-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .galeri-grid.layout-list .galeri-card {
        display: flex;
        align-items: stretch;
    }

    .galeri-grid.layout-list .galeri-image-wrapper {
        flex: 0 0 220px;
        height: 160px;
    }

    .galeri-grid.layout-list .galeri-card-body {
        flex: 1;
        padding: 1rem 1.25rem;
    }

    .galeri-card {
        background: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 12px rgba(15, 23, 42, 0.12);
        cursor: pointer;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .galeri-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(15, 23, 42, 0.18);
    }

    .galeri-image-wrapper {
        position: relative;
        width: 100%;
        height: 190px;
        overflow: hidden;
    }

    .galeri-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.25s ease;
        display: block;
    }

    .galeri-card:hover .galeri-image-wrapper img {
        transform: scale(1.05);
    }

    .galeri-category-badge {
        position: absolute;
        left: 0.75rem;
        top: 0.75rem;
        background: rgba(15, 23, 42, 0.8);
        color: #e5e7eb;
        padding: 0.25rem 0.6rem;
        border-radius: 999px;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .galeri-card-body {
        padding: 1rem 1.1rem 1.1rem;
    }

    .galeri-card-title {
        font-size: 1rem;
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 0.4rem;
    }

    .galeri-card-desc {
        font-size: 0.875rem;
        color: #6b7280;
        margin-bottom: 0.75rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .galeri-card-meta {
        display: flex;
        justify-content: space-between;
        font-size: 0.75rem;
        color: #9ca3af;
    }

    .galeri-empty {
        text-align: center;
        padding: 3rem 0;
        color: #6b7280;
    }

    .galeri-pagination {
        display: flex;
        justify-content: center;
        margin: 2rem 0 1rem;
    }

    /* Toolbar layout control */
    .galeri-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        gap: 1rem;
    }

    .galeri-toolbar-title {
        font-size: 0.95rem;
        color: #6b7280;
    }

    .galeri-layout-toggle {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        background: #e5e7eb;
        padding: 0.25rem;
        border-radius: 999px;
    }

    .galeri-layout-btn {
        border: none;
        background: transparent;
        color: #4b5563;
        width: 32px;
        height: 32px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.2s ease, color 0.2s ease, transform 0.15s ease;
        font-size: 0.85rem;
    }

    .galeri-layout-btn i {
        pointer-events: none;
    }

    .galeri-layout-btn:hover {
        background: rgba(37, 99, 235, 0.08);
        color: #1d4ed8;
        transform: translateY(-1px);
    }

    .galeri-layout-btn.is-active {
        background: #1e3a8a;
        color: #ffffff;
        box-shadow: 0 8px 18px rgba(30, 64, 175, 0.35);
    }

    /* Modal */
    .galeri-modal-img {
        max-height: 70vh;
        object-fit: contain;
    }

    @media (max-width: 768px) {
        .galeri-container {
            padding: 0 1rem;
        }

        .galeri-hero-title {
            font-size: 1.8rem;
        }

        .galeri-toolbar {
            flex-direction: column;
            align-items: flex-start;
        }

        .galeri-layout-toggle {
            align-self: stretch;
            justify-content: flex-start;
        }

        .galeri-grid.layout-2-cols,
        .galeri-grid.layout-3-cols,
        .galeri-grid.layout-4-cols {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .galeri-grid.layout-masonry {
            column-count: 1;
        }
    }

    @media (min-width: 641px) and (max-width: 1024px) {
        .galeri-grid.layout-2-cols {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .galeri-grid.layout-3-cols {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .galeri-grid.layout-4-cols {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .galeri-grid.layout-masonry {
            column-count: 2;
        }
    }

    @media (min-width: 1025px) {
        .galeri-grid.layout-2-cols {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .galeri-grid.layout-3-cols {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .galeri-grid.layout-4-cols {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .galeri-grid.layout-masonry {
            column-count: 3;
        }
    }
</style>

<div class="galeri-hero">
    <div class="galeri-container">
        <nav class="galeri-breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('user.dashboard') }}">Beranda</a>
            <span> / </span>
            <span>Galeri</span>
        </nav>
        <h1 class="galeri-hero-title">
            <i class="fas fa-images"></i>
            <span>Galeri Sekolah</span>
        </h1>
        <p class="galeri-hero-subtitle">Kumpulan dokumentasi kegiatan, fasilitas, dan momen terbaik di lingkungan sekolah.</p>
    </div>
</div>

<div class="galeri-container">
    <div class="galeri-toolbar">
        <div class="galeri-toolbar-title">
            Tampilan galeri
        </div>
        <div class="galeri-layout-toggle" aria-label="Pengaturan tampilan galeri">
            <button type="button" class="galeri-layout-btn" data-layout="2-cols" title="2 Kolom">
                <i class="fas fa-border-all"></i>
            </button>
            <button type="button" class="galeri-layout-btn" data-layout="3-cols" title="3 Kolom">
                <i class="fas fa-th-large"></i>
            </button>
            <button type="button" class="galeri-layout-btn" data-layout="4-cols" title="4 Kolom">
                <i class="fas fa-th"></i>
            </button>
            <button type="button" class="galeri-layout-btn" data-layout="masonry" title="Masonry">
                <i class="fas fa-grip-vertical"></i>
            </button>
            <button type="button" class="galeri-layout-btn" data-layout="list" title="List">
                <i class="fas fa-list"></i>
            </button>
        </div>
    </div>
    <div class="galeri-grid layout-3-cols">
        @forelse($galleries as $gallery)
            <div class="galeri-card" data-bs-toggle="modal" data-bs-target="#galeriModal" data-image="{{ $gallery->cover_image ? asset('storage/'.$gallery->cover_image) : asset('images/default.jpg') }}" data-title="{{ $gallery->title }}" data-description="{{ $gallery->description }}">
                <div class="galeri-image-wrapper">
                    @if($gallery->cover_image)
                        <img src="{{ asset('storage/'.$gallery->cover_image) }}" alt="{{ $gallery->title }}">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" alt="{{ $gallery->title }}">
                    @endif
                    <span class="galeri-category-badge">{{ $gallery->category->name ?? 'Umum' }}</span>
                </div>
                <div class="galeri-card-body">
                    <div class="galeri-card-title">{{ $gallery->title }}</div>
                    <div class="galeri-card-desc">{{ Str::limit($gallery->description, 120, '...') }}</div>
                    <div class="galeri-card-meta">
                        <span>Dibuat: {{ $gallery->created_at?->format('d M Y') }}</span>
                        <span>Update: {{ $gallery->updated_at?->format('d M Y') }}</span>
                    </div>
                    <div style="margin-top:0.75rem; text-align:right;">
                        <a href="{{ route('user.gallery.show', $gallery->id) }}" class="btn btn-sm" style="background:#2563eb; color:white; border-radius:999px; padding:0.35rem 0.9rem; font-size:0.8rem; font-weight:500; text-decoration:none;">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="galeri-empty">Belum ada galeri tersedia.</div>
        @endforelse
    </div>

    @if($galleries->hasPages())
        <div class="galeri-pagination">
            {{ $galleries->links() }}
        </div>
    @endif
</div>

<!-- Modal Lightbox -->
<div class="modal fade" id="galeriModal" tabindex="-1" aria-labelledby="galeriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="background:#0b1120; color:#e5e7eb;">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="galeriModalLabel"></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="galeriModalImg" src="" alt="" class="img-fluid galeri-modal-img mb-3">
                <p id="galeriModalDesc" style="font-size:0.9rem; color:#cbd5f5;"></p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('galeriModal');
        const modalImg = document.getElementById('galeriModalImg');
        const modalTitle = document.getElementById('galeriModalLabel');
        const modalDesc = document.getElementById('galeriModalDesc');

        // Lightbox modal
        if (modal) {
            modal.addEventListener('show.bs.modal', function (event) {
                const card = event.relatedTarget;
                if (!card) return;

                const image = card.getAttribute('data-image');
                const title = card.getAttribute('data-title');
                const description = card.getAttribute('data-description') || '';

                modalImg.src = image;
                modalTitle.textContent = title;
                modalDesc.textContent = description;
            });
        }

        // Layout toggle
        const layoutKey = 'userGalleryLayout';
        const grid = document.querySelector('.galeri-grid');
        const layoutButtons = document.querySelectorAll('.galeri-layout-btn');
        const availableLayouts = ['2-cols', '3-cols', '4-cols', 'masonry', 'list'];

        if (grid && layoutButtons.length) {
            const savedLayout = localStorage.getItem(layoutKey) || '3-cols';

            function applyLayout(layout) {
                if (!availableLayouts.includes(layout)) {
                    layout = '3-cols';
                }

                availableLayouts.forEach(function (l) {
                    grid.classList.remove('layout-' + l);
                });
                grid.classList.add('layout-' + layout);

                layoutButtons.forEach(function (btn) {
                    const btnLayout = btn.getAttribute('data-layout');
                    if (btnLayout === layout) {
                        btn.classList.add('is-active');
                    } else {
                        btn.classList.remove('is-active');
                    }
                });

                localStorage.setItem(layoutKey, layout);
            }

            // Inisialisasi layout dari localStorage
            applyLayout(savedLayout);

            // Event listener untuk tombol toggle
            layoutButtons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const layout = btn.getAttribute('data-layout');
                    applyLayout(layout);
                });
            });
        }
    });
</script>
@endsection
