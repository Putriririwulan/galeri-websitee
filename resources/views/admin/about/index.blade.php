@extends('layouts.app')

@section('content')
<div class="container" style="max-width:1400px;margin:0 auto;padding:2rem;">
    <div style="display:flex;align-items:center;gap:1rem;margin-bottom:2rem;">
        <a href="{{ route('admin.dashboard') }}" style="background:#64748b;color:#fff;padding:0.5rem 1rem;border-radius:8px;text-decoration:none;font-weight:600;">
            ← Kembali
        </a>
        <h1 style="color:#f1f5f9;font-size:1.75rem;font-weight:700;margin:0;">Manajemen Tentang Kami</h1>
    </div>

    @if(session('success'))
        <div style="padding:1rem 1.5rem;border-radius:10px;margin-bottom:1.5rem;background:rgba(34,197,94,0.1);border:1px solid #22c55e;color:#22c55e;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(500px,1fr));gap:2rem;">
        @forelse($abouts as $about)
            <div class="card">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
                    <h2 style="color:#3b82f6;font-size:1.3rem;font-weight:600;margin:0;">
                        {{ $about->type == 'sejarah' ? 'Sejarah Sekolah' : ' Visi & Misi' }}
                    </h2>
                    <a href="{{ route('about.edit', $about) }}" style="background:#3b82f6;color:#fff;padding:0.5rem 1.25rem;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.9rem;">
                        Edit
                    </a>
                </div>

                @if($about->image)
                    <div style="margin-bottom:1rem;">
                        <img src="{{ asset('storage/'.$about->image) }}" alt="{{ $about->title }}" style="width:100%;max-height:200px;object-fit:cover;border-radius:10px;">
                    </div>
                @endif

                <h3 style="color:#f1f5f9;font-size:1.1rem;font-weight:600;margin-bottom:0.75rem;">{{ $about->title }}</h3>
                <p style="color:#94a3b8;line-height:1.6;margin:0;">{{ Str::limit($about->content, 200) }}</p>

                <div style="margin-top:1rem;padding-top:1rem;border-top:1px solid #334155;">
                    <small style="color:#64748b;">Terakhir diupdate: {{ $about->updated_at->format('d M Y, H:i') }}</small>
                </div>
            </div>
        @empty
            <div style="grid-column:1/-1;text-align:center;padding:3rem;background:#1e293b;border-radius:12px;border:1px dashed #334155;">
                <div style="font-size:3rem;margin-bottom:1rem;"></div>
                <p style="color:#64748b;">Belum ada data Tentang Kami</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
