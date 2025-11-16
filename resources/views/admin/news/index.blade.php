@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    
    * {
        font-family: 'Poppins', sans-serif;
    }

    .news-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
    }

    .news-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
        background: #ffffff;
        padding: 1.5rem 2rem;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .news-header h1 {
        font-size: 1.5rem;
        margin: 0;
        color: #1e293b;
        font-weight: 700;
    }

    .btn-add {
        background: #1e293b;
        color: #fff;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-add:hover {
        background: #334155;
        transform: translateY(-2px);
        color: #fff;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.5rem;
    }

    .news-card {
        background: #faf9f7;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e5e5e5;
        transition: all 0.3s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .news-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    .news-card-image {
        position: relative;
        height: 200px;
        overflow: hidden;
        background: #e5e5e5;
    }

    .news-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .status-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        padding: 0.4rem 0.8rem;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .status-published {
        background: #22c55e;
        color: #fff;
    }

    .status-draft {
        background: #fbbf24;
        color: #1f2937;
    }

    .news-card-content {
        padding: 1.5rem;
        background: #faf9f7;
    }

    .news-card-title {
        margin: 0 0 0.75rem 0;
        font-size: 1.1rem;
        font-weight: 700;
        color: #000000 !important;
        line-height: 1.4;
    }

    .news-card-excerpt {
        margin: 0 0 1rem 0;
        font-size: 0.875rem;
        color: #1e293b !important;
        line-height: 1.6;
    }

    .news-card-date {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #64748b !important;
        font-size: 0.85rem;
    }
    
    .news-card-date span {
        color: #64748b !important;
    }

    .news-card-footer {
        padding: 1rem 1.5rem;
        background: #faf9f7;
        display: flex;
        gap: 0.5rem;
    }

    .btn-edit {
        flex: 1;
        background: #3b82f6;
        color: #fff;
        padding: 0.6rem 1rem;
        border-radius: 8px;
        text-decoration: none;
        text-align: center;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s;
        border: none;
        cursor: pointer;
    }

    .btn-edit:hover {
        background: #2563eb;
        color: #fff;
    }

    .btn-delete {
        flex: 1;
        background: #ef4444;
        color: #fff;
        padding: 0.6rem 1rem;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s;
    }

    .btn-delete:hover {
        background: #dc2626;
    }

    .alert-success {
        background: linear-gradient(135deg, #166534 0%, #22c55e 100%);
        color: #fff;
        border-radius: 10px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        font-weight: 500;
        box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        text-align: center;
        border: 1px solid #22c55e;
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 3rem;
        color: #64748b;
        background: #faf9f7;
        border-radius: 12px;
        border: 2px dashed #e5e5e5;
    }
</style>

<div class="news-container">
    <div class="news-header">
        <h1>Manajemen Berita Terkini</h1>
        <a href="{{ route('news.create') }}" class="btn-add">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                <path d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Berita
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="news-grid">
        @forelse($news as $item)
            <div class="news-card">
                <!-- Image -->
                <div class="news-card-image">
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}">
                    @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:#94a3b8;font-size:3rem;">
                            📰
                        </div>
                    @endif
                    <!-- Status Badge -->
                    <div class="status-badge {{ $item->status == 'published' ? 'status-published' : 'status-draft' }}">
                        {{ ucfirst($item->status) }}
                    </div>
                </div>

                <!-- Content -->
                <div class="news-card-content">
                    <h3 class="news-card-title">
                        {{ $item->title }}
                    </h3>
                    <p class="news-card-excerpt">
                        {{ Str::limit($item->content, 100) }}
                    </p>
                    <div class="news-card-date">
                        <svg style="width:16px;height:16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>{{ $item->published_date->format('d M Y') }}</span>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="news-card-footer">
                    <a href="{{ route('news.edit', $item) }}" class="btn-edit">
                        Edit
                    </a>
                    <form action="{{ route('news.destroy', $item) }}" method="POST" style="flex:1;margin:0;" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" style="width:100%;">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div style="font-size:3rem;margin-bottom:1rem;opacity:0.5;">📰</div>
                <p style="margin:0;">Belum ada berita</p>
            </div>
        @endforelse
    </div>

    <div style="margin-top:2rem;">
        {{ $news->links() }}
    </div>
</div>
@endsection
