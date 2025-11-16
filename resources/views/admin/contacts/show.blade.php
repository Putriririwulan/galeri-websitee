@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    
    * {
        font-family: 'Poppins', sans-serif;
    }

    .detail-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
    }

    .back-link {
        color: #3b82f6;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
        font-weight: 500;
        transition: all 0.2s;
    }

    .back-link:hover {
        color: #2563eb;
        transform: translateX(-4px);
    }

    .detail-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 2rem;
    }

    .detail-header h1 {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }

    .detail-card {
        background: #faf9f7;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }

    .detail-card-header {
        padding: 1.5rem 2rem;
        background: #faf9f7;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #e5e5e5;
    }

    .detail-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b !important;
        margin: 0;
    }

    .status-badges {
        display: flex;
        gap: 0.75rem;
        align-items: center;
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .status-read {
        background: #22c55e;
        color: white;
    }

    .status-unread {
        background: #64748b;
        color: white;
    }

    .btn-mark {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-mark-read {
        background: #22c55e;
        color: white;
    }

    .btn-mark-read:hover {
        background: #16a34a;
    }

    .btn-mark-unread {
        background: #64748b;
        color: white;
    }

    .btn-mark-unread:hover {
        background: #475569;
    }

    .detail-content {
        padding: 2rem;
        background: #faf9f7;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .info-item label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #64748b;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-item p {
        color: #1e293b;
        font-size: 1rem;
        margin: 0;
        font-weight: 500;
    }

    .info-item a {
        color: #3b82f6;
        text-decoration: underline;
    }

    .message-section {
        border-top: 1px solid #e5e5e5;
        padding-top: 1.5rem;
    }

    .message-section label {
        display: block;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #64748b;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .message-box {
        background: #1e293b;
        padding: 1.5rem;
        border-radius: 12px;
        border: 1px solid #334155;
    }

    .message-box p {
        color: #e2e8f0;
        line-height: 1.8;
        margin: 0;
        white-space: pre-line;
    }

    .action-buttons {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e5e5e5;
        display: flex;
        gap: 1rem;
    }

    .btn-action {
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-reply {
        background: #3b82f6;
        color: white;
    }

    .btn-reply:hover {
        background: #2563eb;
        transform: translateY(-2px);
    }

    .btn-delete {
        background: #ef4444;
        color: white;
    }

    .btn-delete:hover {
        background: #dc2626;
        transform: translateY(-2px);
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
</style>

<div class="detail-container">
    <a href="{{ route('contacts.index') }}" class="back-link">
        <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali ke Daftar Pesan
    </a>
    
    <div class="detail-header">
        <svg style="width: 32px; height: 32px; color: #3b82f6;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
        </svg>
        <h1>Detail Pesan</h1>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="detail-card">
        <div class="detail-card-header">
            <h3 class="detail-card-title">{{ $contact->subject }}</h3>
            <div class="status-badges">
                @if($contact->status === 'unread')
                    <span class="status-badge status-unread">
                        Tandai Belum Dibaca
                    </span>
                    <form action="{{ route('contacts.mark-read', $contact->id) }}" method="POST" style="display: inline; margin: 0;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-mark btn-mark-read">
                            Sudah Dibaca
                        </button>
                    </form>
                @else
                    <span class="status-badge status-read">
                        Sudah Dibaca
                    </span>
                    <form action="{{ route('contacts.mark-unread', $contact->id) }}" method="POST" style="display: inline; margin: 0;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-mark btn-mark-unread">
                            Tandai Belum Dibaca
                        </button>
                    </form>
                @endif
            </div>
        </div>
        
        <div class="detail-content">
            <div class="info-grid">
                <div class="info-item">
                    <label>Nama Pengirim</label>
                    <p>{{ $contact->name }}</p>
                </div>
                
                <div class="info-item">
                    <label>Email</label>
                    <p>
                        <a href="mailto:{{ $contact->email }}">
                            {{ $contact->email }}
                        </a>
                    </p>
                </div>
                
                <div class="info-item">
                    <label>Tanggal Dikirim</label>
                    <p>{{ $contact->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
            
            <div class="message-section">
                <label>Isi Pesan</label>
                <div class="message-box">
                    <p>{{ $contact->message }}</p>
                </div>
            </div>
            
            <div class="action-buttons">
                <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" 
                   class="btn-action btn-reply">
                    <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Balas via Email
                </a>
                
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline; margin: 0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="btn-action btn-delete"
                            onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                        <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
