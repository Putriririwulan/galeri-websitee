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

    .unread-badge {
        background: #ef4444;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
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

    .table-aesthetic td.title-cell {
        font-weight: 600;
        color: #1e293b;
    }

    .status-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
    }

    .status-unread {
        background: #ef4444;
    }

    .status-read {
        background: #22c55e;
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
        background: #dbeafe;
        color: #1d4ed8;
    }

    .btn-view:hover {
        background: #bfdbfe;
        color: #1e40af;
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
    }

</style>

<div class="gallery-container">
    <div class="gallery-header">
        <h1>
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Pesan Kontak
        </h1>
        <div class="unread-badge">
            {{ $unreadCount }} Pesan Belum Dibaca
        </div>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-wrapper">
        <table class="table-aesthetic">
            <thead>
                <tr>
                    <th style="width: 60px;">Status</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th style="width: 150px;">Tanggal</th>
                    <th style="width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>
                            @if($contact->status === 'unread')
                                <span class="status-dot status-unread"></span>
                            @else
                                <span class="status-dot status-read"></span>
                            @endif
                        </td>
                        <td class="{{ $contact->status === 'unread' ? 'title-cell' : '' }}">
                            {{ $contact->name }}
                        </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ Str::limit($contact->subject, 40) }}</td>
                        <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('contacts.show', $contact->id) }}" class="btn-icon btn-view" title="Lihat">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;margin:0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon btn-delete" onclick="return confirm('Yakin hapus pesan ini?')" title="Hapus">
                                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-muted" style="text-align:center;padding:2rem;color:#94a3b8;">
                            Belum ada pesan masuk
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($contacts->hasPages())
        <div style="margin-top: 1.5rem; display: flex; justify-content: center;">
            {{ $contacts->links() }}
        </div>
    @endif
</div>
@endsection
