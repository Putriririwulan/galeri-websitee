@extends('layouts.app')

@section('content')
<div class="user-gallery-container" style="padding-top: 2rem;">
    <h2 class="user-gallery-title">Semua Galeri Sekolah</h2>

    <div style="text-align:center; margin-bottom: 1rem;">
        <a href="{{ route('user.dashboard') }}" class="btn-selengkapnya">Kembali ke Beranda</a>
    </div>

    <div class="user-gallery-row">
        @forelse($galleries as $gallery)
            <div class="user-gallery-card">
                <div class="image-wrapper">
                    @if($gallery->cover_image)
                        <img src="{{ asset('storage/'.$gallery->cover_image) }}" alt="{{ $gallery->title }}">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" alt="{{ $gallery->title }}">
                    @endif
                    <span class="category-badge">{{ $gallery->category->name ?? 'UMUM' }}</span>
                </div>
                <div class="card-body">
                    <div class="card-title">{{ $gallery->title }}</div>
                    <div class="card-text">{{ Str::limit($gallery->description, 120, '...') }}</div>
                </div>
                <div class="card-footer-dates">
                    <div class="date-item">
                        <span class="date-label">Created</span>
                        <span class="date-value">{{ $gallery->created_at?->format('d M Y') }}</span>
                    </div>
                    <div class="date-item">
                        <span class="date-label">Updated</span>
                        <span class="date-value">{{ $gallery->updated_at?->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="user-gallery-empty text-center">Belum ada galeri tersedia</div>
        @endforelse
    </div>

    <div style="margin-top: 1.5rem; display:flex; justify-content:center;">
        {{ $galleries->links() }}
    </div>
</div>
@endsection
