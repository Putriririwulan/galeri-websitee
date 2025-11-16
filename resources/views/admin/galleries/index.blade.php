@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    
    * {
        font-family: 'Poppins', sans-serif;
    }

    .gallery-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
    }

    .gallery-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
        background: #ffffff;
        padding: 1.5rem 2rem;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .gallery-header h1 {
        font-size: 1.5rem;
        margin: 0;
        color: #1e293b;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .gallery-header h1 svg {
        width: 28px;
        height: 28px;
        color: #1e293b;
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

    .table-wrapper {
        background: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .table-aesthetic {
        width: 100%;
        border-collapse: collapse;
        background: #ffffff;
    }

    .table-aesthetic thead {
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    .table-aesthetic th {
        padding: 1rem 1.5rem;
        text-align: left;
        font-weight: 600;
        font-size: 0.875rem;
        color: #64748b;
        text-transform: capitalize;
        letter-spacing: 0;
    }

    .table-aesthetic tbody tr {
        border-bottom: 1px solid #f1f5f9;
        transition: all 0.2s;
    }

    .table-aesthetic tbody tr:hover {
        background: #f8fafc;
    }

    .table-aesthetic tbody tr:last-child {
        border-bottom: none;
    }

    .table-aesthetic td {
        padding: 1rem 1.5rem;
        color: #1e293b;
        font-size: 0.875rem;
        vertical-align: middle;
    }

    .table-aesthetic td.photo-cell {
        width: 80px;
        padding: 0.75rem;
    }

    .table-aesthetic td img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        display: block;
    }

    .table-aesthetic td.title-cell {
        font-weight: 600;
        color: #1e293b;
    }

    .table-aesthetic td.category-cell .badge {
        display: inline-block;
        padding: 0.35rem 0.75rem;
        background: #e0e7ff;
        color: #3730a3;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .table-aesthetic td.description-cell {
        color: #64748b;
        max-width: 300px;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .btn-icon {
        width: 36px;
        height: 36px;
        border-radius: 6px;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
        padding: 0;
    }

    .btn-icon svg {
        width: 18px;
        height: 18px;
    }

    .btn-view {
        background: #f1f5f9;
        color: #64748b;
    }

    .btn-view:hover {
        background: #e2e8f0;
        color: #475569;
    }

    .btn-edit {
        background: #fef3c7;
        color: #d97706;
    }

    .btn-edit:hover {
        background: #fde68a;
        color: #b45309;
    }

    .btn-delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fecaca;
        color: #b91c1c;
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

    .text-muted {
        color: #64748b;
        font-style: italic;
    }

    @media (max-width: 700px) {
        .gallery-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .table-aesthetic th,
        .table-aesthetic td {
            padding: 0.8rem 0.6rem;
            font-size: 0.85rem;
        }

        .table-aesthetic td img {
            max-width: 80px;
            height: 80px;
        }
    }
</style>


<div class="gallery-container">
    <div class="gallery-header">
        <h1>
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Daftar Foto
        </h1>
        <a href="{{ route('galleries.create') }}" class="btn-add">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                <path d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Foto
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-wrapper">
        <table class="table-aesthetic">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>  
                @forelse($galleries as $gallery)
                    <tr>
                        <td class="photo-cell">
                            @if($gallery->cover_image)
                                <img src="{{ asset('storage/'.$gallery->cover_image) }}" alt="{{ $gallery->title }}">
                            @else
                                <div style="width:60px;height:60px;background:#f1f5f9;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#94a3b8;">
                                    <svg style="width:24px;height:24px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="title-cell">{{ $gallery->title }}</td>
                        <td class="category-cell">
                            <span class="badge">{{ $gallery->category->name ?? '-' }}</span>
                        </td>
                        <td class="description-cell">{{ Str::limit($gallery->description ?? '---', 50) }}</td>
                        <td>{{ $gallery->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon btn-view" title="Lihat">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn-icon btn-edit" title="Edit">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" style="display:inline-block;margin:0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon btn-delete" onclick="return confirm('Yakin hapus foto ini?')" title="Hapus">
                                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-muted" style="text-align:center;padding:2rem;color:#94a3b8;">Belum ada data galeri</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
