@extends('layouts.app')

@section('content')
<div class="container" style="max-width:900px;margin:0 auto;padding:2rem;">
    <h1 style="color:#f1f5f9;font-size:1.75rem;font-weight:700;margin-bottom:2rem;">
        Edit {{ $about->type == 'sejarah' ? 'Sejarah Sekolah' : 'Visi & Misi' }}
    </h1>

    <div class="card">
        <form action="{{ route('about.update', $about) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="margin-bottom:1.5rem;">
                <label style="display:block;margin-bottom:0.5rem;color:#f1f5f9;font-weight:500;">Tipe</label>
                <input type="text" value="{{ $about->type == 'sejarah' ? 'Sejarah' : 'Visi & Misi' }}" disabled
                    style="width:100%;padding:0.75rem 1rem;background:#334155;border:1px solid #475569;border-radius:10px;color:#94a3b8;">
            </div>

            <div style="margin-bottom:1.5rem;">
                <label for="title" style="display:block;margin-bottom:0.5rem;color:#f1f5f9;font-weight:500;">Judul *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $about->title) }}" required
                    style="width:100%;padding:0.75rem 1rem;background:#ffffff;border:1px solid #d1d5db;border-radius:10px;color:#1f2937;">
                @error('title')
                    <span style="color:#ef4444;font-size:0.875rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom:1.5rem;">
                <label for="content" style="display:block;margin-bottom:0.5rem;color:#f1f5f9;font-weight:500;">Konten *</label>
                <textarea name="content" id="content" rows="10" required
                    style="width:100%;padding:0.75rem 1rem;background:#ffffff;border:1px solid #d1d5db;border-radius:10px;color:#1f2937;resize:vertical;">{{ old('content', $about->content) }}</textarea>
                @error('content')
                    <span style="color:#ef4444;font-size:0.875rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom:1.5rem;">
                <label for="image" style="display:block;margin-bottom:0.5rem;color:#f1f5f9;font-weight:500;">Gambar</label>
                @if($about->image)
                    <div style="margin-bottom:1rem;">
                        <img src="{{ asset('storage/'.$about->image) }}" alt="{{ $about->title }}" style="max-width:400px;border-radius:10px;">
                        <p style="color:#94a3b8;font-size:0.875rem;margin-top:0.5rem;">Gambar saat ini</p>
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*"
                    style="width:100%;padding:0.75rem 1rem;background:#ffffff;border:1px solid #d1d5db;border-radius:10px;color:#1f2937;">
                <small style="color:#94a3b8;font-size:0.875rem;">Format: JPG, PNG, GIF. Max: 2MB. Kosongkan jika tidak ingin mengubah gambar.</small>
                @error('image')
                    <span style="color:#ef4444;font-size:0.875rem;display:block;">{{ $message }}</span>
                @enderror
            </div>

            @if($about->type == 'sejarah')
            <hr style="border:1px solid #334155;margin:2rem 0;">

            <h3 style="color:#f1f5f9;font-size:1.25rem;font-weight:600;margin-bottom:1.5rem;">
                Pengaturan Section Cards
            </h3>

            <div style="margin-bottom:1.5rem;">
                <label for="cards_section_title" style="display:block;margin-bottom:0.5rem;color:#f1f5f9;font-weight:500;">Judul Section Cards</label>
                <input type="text" name="cards_section_title" id="cards_section_title" 
                    value="{{ old('cards_section_title', $about->cards_section_title ?? 'Lebih Lanjut Tentang Kami') }}"
                    style="width:100%;padding:0.75rem 1rem;background:#ffffff;border:1px solid #d1d5db;border-radius:10px;color:#1f2937;">
                <small style="color:#94a3b8;font-size:0.875rem;">Judul untuk section cards di halaman Tentang Kami</small>
                @error('cards_section_title')
                    <span style="color:#ef4444;font-size:0.875rem;display:block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom:1.5rem;">
                <label for="cards_section_empty_message" style="display:block;margin-bottom:0.5rem;color:#f1f5f9;font-weight:500;">Pesan Jika Belum Ada Data</label>
                <textarea name="cards_section_empty_message" id="cards_section_empty_message" rows="3"
                    style="width:100%;padding:0.75rem 1rem;background:#ffffff;border:1px solid #d1d5db;border-radius:10px;color:#1f2937;resize:vertical;">{{ old('cards_section_empty_message', $about->cards_section_empty_message ?? 'Belum ada informasi tambahan. Silakan tambahkan melalui admin panel.') }}</textarea>
                <small style="color:#94a3b8;font-size:0.875rem;">Pesan yang ditampilkan jika belum ada card informasi tambahan</small>
                @error('cards_section_empty_message')
                    <span style="color:#ef4444;font-size:0.875rem;display:block;">{{ $message }}</span>
                @enderror
            </div>
            @endif

            <div style="display:flex;gap:1rem;margin-top:2rem;">
                <button type="submit" class="btn" style="background:#3b82f6;color:#fff;padding:0.75rem 2rem;border-radius:10px;border:none;font-weight:600;cursor:pointer;">
                    Update
                </button>
                <a href="{{ route('about.index') }}" style="background:#64748b;color:#fff;padding:0.75rem 2rem;border-radius:10px;text-decoration:none;font-weight:600;display:inline-block;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
