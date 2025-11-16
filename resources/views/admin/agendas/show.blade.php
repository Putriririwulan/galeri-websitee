@extends('layouts.app')

@section('content')
<div style="margin-bottom: 2rem;">
    <h1 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 0.5rem;">📅 Detail Agenda</h1>
    <p style="color: #94a3b8;">Informasi lengkap agenda kegiatan</p>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3 class="card-title">{{ $agenda->title }}</h3>
        @if($agenda->is_published)
            <span style="display: inline-block; padding: 0.5rem 1rem; background: rgba(34, 197, 94, 0.1); color: #22c55e; border: 1px solid #22c55e; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">
                ✓ Published
            </span>
        @else
            <span style="display: inline-block; padding: 0.5rem 1rem; background: rgba(148, 163, 184, 0.1); color: #94a3b8; border: 1px solid #94a3b8; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">
                ○ Draft
            </span>
        @endif
    </div>
    
    <div style="padding: 1.5rem;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
            <div>
                <div style="display: flex; align-items: center; gap: 0.75rem; padding: 1rem; background: rgba(59, 130, 246, 0.1); border: 1px solid #3b82f6; border-radius: 10px;">
                    <svg style="width: 24px; height: 24px; color: #3b82f6;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    <div>
                        <div style="font-size: 0.8rem; color: #94a3b8; margin-bottom: 0.25rem;">Tanggal</div>
                        <div style="font-size: 1.1rem; font-weight: 600; color: #f1f5f9;">
                            {{ $agenda->event_date->format('d F Y') }}
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div style="display: flex; align-items: center; gap: 0.75rem; padding: 1rem; background: rgba(168, 85, 247, 0.1); border: 1px solid #a855f7; border-radius: 10px;">
                    <svg style="width: 24px; height: 24px; color: #a855f7;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <div>
                        <div style="font-size: 0.8rem; color: #94a3b8; margin-bottom: 0.25rem;">Waktu</div>
                        <div style="font-size: 1.1rem; font-weight: 600; color: #f1f5f9;">
                            {{ \Carbon\Carbon::parse($agenda->event_time)->format('H:i') }} WIB
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 2rem;">
            <h4 style="font-size: 1rem; font-weight: 600; color: #d2b48c; margin-bottom: 1rem;">Deskripsi</h4>
            <div style="background: rgba(30, 41, 59, 0.5); padding: 1.5rem; border-radius: 10px; border-left: 3px solid #d2b48c; line-height: 1.8; color: #e2e8f0;">
                {{ $agenda->description }}
            </div>
        </div>

        <div style="padding: 1rem; background: rgba(100, 116, 139, 0.1); border-radius: 10px; margin-bottom: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem; color: #94a3b8;">
                <div>
                    <strong>Dibuat:</strong> {{ $agenda->created_at->format('d M Y H:i') }}
                </div>
                <div>
                    <strong>Terakhir diupdate:</strong> {{ $agenda->updated_at->format('d M Y H:i') }}
                </div>
            </div>
        </div>

        <div style="display: flex; gap: 1rem; padding-top: 1rem; border-top: 1px solid #334155;">
            <a href="{{ route('agendas.edit', $agenda->id) }}" 
               class="btn" 
               style="display: inline-flex; align-items: center; gap: 0.5rem; background: #3b82f6;">
                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Agenda
            </a>
            
            <form action="{{ route('agendas.toggle-publish', $agenda->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('PATCH')
                <button type="submit" 
                        class="btn" 
                        style="display: inline-flex; align-items: center; gap: 0.5rem; background: {{ $agenda->is_published ? '#f59e0b' : '#10b981' }};">
                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        @if($agenda->is_published)
                            <path d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        @else
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        @endif
                    </svg>
                    {{ $agenda->is_published ? 'Sembunyikan' : 'Publikasikan' }}
                </button>
            </form>

            <a href="{{ route('agendas.index') }}" 
               class="btn" 
               style="background: #64748b; display: inline-flex; align-items: center; gap: 0.5rem;">
                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>

            <form action="{{ route('agendas.destroy', $agenda->id) }}" 
                  method="POST" 
                  style="display: inline; margin-left: auto;"
                  onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="btn btn-danger" 
                        style="display: inline-flex; align-items: center; gap: 0.5rem;">
                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Hapus Agenda
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
