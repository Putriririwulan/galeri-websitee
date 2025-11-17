@extends('layouts.user.app')

@section('content')
<style>
    body {
        background-color: #ffffff !important;
    }

    .gdetail-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2.5rem 2rem 3rem;
    }

    .gdetail-breadcrumb {
        font-size: 0.875rem;
        color: #6b7280;
        margin-bottom: 1.25rem;
    }

    .gdetail-breadcrumb a {
        color: #2563eb;
        text-decoration: none;
    }

    .gdetail-breadcrumb a:hover {
        text-decoration: underline;
    }

    .gdetail-layout {
        display: grid;
        grid-template-columns: minmax(0, 2fr) minmax(0, 1fr);
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .gdetail-main {
        background: #ffffff;
        border-radius: 16px;
        padding: 1.25rem;
        box-shadow: 0 20px 35px rgba(15,23,42,0.15);
    }

    .gdetail-main img {
        width: 100%;
        max-height: 520px;
        object-fit: contain;
        border-radius: 12px;
        cursor: zoom-in;
    }

    .gdetail-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 0.75rem;
    }

    .gdetail-category-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.25rem 0.75rem;
        border-radius: 999px;
        background: rgba(37,99,235,0.12);
        color: #bfdbfe;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.5rem;
    }

    .gdetail-desc {
        font-size: 0.95rem;
        color: #4b5563;
        margin-top: 0.75rem;
    }

    .gdetail-sidebar {
        background: #ffffff;
        border-radius: 16px;
        padding: 1.5rem 1.5rem 1.25rem;
        box-shadow: 0 10px 25px rgba(15,23,42,0.18);
    }

    .gdetail-sidebar h2 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #0f172a;
    }

    .gdetail-meta-list {
        list-style: none;
        padding: 0;
        margin: 0 0 1.25rem;
        font-size: 0.9rem;
    }

    .gdetail-meta-list li {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        padding: 0.4rem 0;
        border-bottom: 1px dashed #e5e7eb;
    }

    .gdetail-meta-label {
        color: #6b7280;
    }

    .gdetail-meta-value {
        color: #111827;
        font-weight: 500;
        text-align: right;
    }

    .gdetail-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .gdetail-btn {
        border-radius: 999px;
        padding: 0.45rem 0.9rem;
        font-size: 0.85rem;
        font-weight: 500;
        border: 1px solid transparent;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        text-decoration: none;
        cursor: pointer;
    }

    .gdetail-btn-primary {
        background: #2563eb;
        color: #ffffff;
    }

    .gdetail-btn-success {
        background: #16a34a;
        color: #ffffff;
    }

    .gdetail-btn-outline {
        background: #ffffff;
        color: #111827;
        border-color: #e5e7eb;
    }

    .gdetail-btn-secondary {
        background: #0f172a;
        color: #e5e7eb;
    }

    .gdetail-related-title {
        font-size: 1.15rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #0f172a; /* teks terang agar terlihat di background gelap */
    }

    .gdetail-related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 1.5rem;
    }

    .gdetail-related-card {
        background: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 18px rgba(15,23,42,0.15);
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .gdetail-related-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 28px rgba(15,23,42,0.18);
    }

    .gdetail-related-img-wrapper {
        height: 150px;
        overflow: hidden;
    }

    .gdetail-related-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .gdetail-related-body {
        padding: 0.75rem 0.9rem 0.9rem;
    }

    .gdetail-related-title-text {
        font-size: 0.95rem;
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 0.25rem;
    }

    .gdetail-related-meta {
        font-size: 0.8rem;
        color: #6b7280;
        display: flex;
        justify-content: space-between;
    }

    @media (max-width: 900px) {
        .gdetail-layout {
            grid-template-columns: minmax(0, 1fr);
        }
    }

    @media (max-width: 640px) {
        .gdetail-wrapper {
            padding: 1.5rem 1.1rem 2.5rem;
        }
    }
</style>

<div class="gdetail-wrapper">
    <div class="gdetail-breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('user.dashboard') }}">Beranda</a>
        <span> / </span>
        <a href="{{ route('user.gallery') }}">Galeri</a>
        @if($gallery->category)
            <span> / </span>
            <span>{{ $gallery->category->name }}</span>
        @endif
        <span> / </span>
        <span>{{ $gallery->title }}</span>
    </div>

    <div class="gdetail-layout">
        <div class="gdetail-main">
            <div class="gdetail-category-pill">
                <i class="fas fa-folder-open"></i>
                <span>{{ $gallery->category->name ?? 'Umum' }}</span>
            </div>
            <div class="gdetail-title">{{ $gallery->title }}</div>
            <img src="{{ $gallery->getCoverImageUrl() }}" alt="{{ $gallery->title }}" data-bs-toggle="modal" data-bs-target="#gdetailImageModal">
            @if($gallery->description)
                <p class="gdetail-desc">{{ $gallery->description }}</p>
            @endif
        </div>

        <aside class="gdetail-sidebar">
            <h2>Informasi Detail</h2>
            <ul class="gdetail-meta-list">
                <li>
                    <span class="gdetail-meta-label">Uploader</span>
                    <span class="gdetail-meta-value">Admin</span>
                </li>
                <li>
                    <span class="gdetail-meta-label">Tanggal Upload</span>
                    <span class="gdetail-meta-value">{{ $gallery->created_at?->format('d M Y H:i') }}</span>
                </li>
                <li>
                    <span class="gdetail-meta-label">Terakhir Diupdate</span>
                    <span class="gdetail-meta-value">{{ $gallery->updated_at?->format('d M Y H:i') }}</span>
                </li>
                <li>
                    <span class="gdetail-meta-label">Ukuran File</span>
                    <span class="gdetail-meta-value">{{ $fileSizeKb ? $fileSizeKb.' KB' : 'Tidak diketahui' }}</span>
                </li>
                <li>
                    <span class="gdetail-meta-label">Album/Kategori</span>
                    <span class="gdetail-meta-value">{{ $gallery->category->name ?? 'Umum' }}</span>
                </li>
            </ul>

            <div class="gdetail-actions">
                <a href="{{ $gallery->getCoverImageUrl() }}" target="_blank" class="gdetail-btn gdetail-btn-primary">
                    <i class="fas fa-external-link-alt"></i>
                    Lihat Ukuran Penuh
                </a>
                @if($gallery->cover_image)
                    <a href="{{ route('user.gallery.show', $gallery->id) }}?download=1" class="gdetail-btn gdetail-btn-success">
                        <i class="fas fa-download"></i>
                        Download
                    </a>
                @endif
                @if($gallery->category)
                    <a href="{{ route('user.gallery', ['category' => $gallery->category->name]) }}" class="gdetail-btn gdetail-btn-outline">
                        <i class="fas fa-images"></i>
                        Lihat Album
                    </a>
                @endif
                <a href="{{ route('user.gallery') }}" class="gdetail-btn gdetail-btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Galeri
                </a>
            </div>
        </aside>
    </div>

    @if($relatedGalleries->count())
        <div>
            <div class="gdetail-related-title">
                <i class="fas fa-image" style="margin-right:0.35rem;"></i>
                Foto Terkait dari Album "{{ $gallery->category->name ?? 'Umum' }}"
            </div>
            <div class="gdetail-related-grid">
                @foreach($relatedGalleries as $item)
                    <a href="{{ route('user.gallery.show', $item->id) }}" class="gdetail-related-card">
                        <div class="gdetail-related-img-wrapper">
                            @if($item->cover_image)
                                <img src="{{ asset('storage/'.$item->cover_image) }}" alt="{{ $item->title }}">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" alt="{{ $item->title }}">
                            @endif
                        </div>
                        <div class="gdetail-related-body">
                            <div class="gdetail-related-title-text">{{ $item->title }}</div>
                            <div class="gdetail-related-meta">
                                <span><i class="fas fa-user"></i> Admin</span>
                                <span><i class="far fa-calendar-alt"></i> {{ $item->created_at?->format('d M Y') }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>

<!-- Modal untuk zoom gambar utama -->
<div class="modal fade" id="gdetailImageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="background:#020617; border-radius:18px;">
            <div class="modal-header border-0">
                <h5 class="modal-title text-light">{{ $gallery->title }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ $gallery->getCoverImageUrl() }}" alt="{{ $gallery->title }}" style="max-width:100%; max-height:80vh; object-fit:contain;">
            </div>
        </div>
    </div>
</div>
@endsection
