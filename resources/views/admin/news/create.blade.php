@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        min-height: 100vh;
        background: linear-gradient(135deg, #0f172a, #1e2a3a 40%, #3b5b92 100%);
        background-attachment: fixed;
        color: #f0f4ff;
    }

    .gallery-card {
        max-width: 650px;
        margin: 3rem auto;
        padding: 2.5rem 2rem;
        background: rgba(255, 255, 255, 0.07);
        border-radius: 16px;
        box-shadow: 0 8px 28px rgba(0,0,0,0.35);
        backdrop-filter: blur(8px);
        animation: fadeIn 0.7s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(40px);}
        to { opacity: 1; transform: none;}
    }

    .gallery-card h1 {
        font-size: 2rem;
        margin-bottom: 2rem;
        text-align: center;
        font-weight: 700;
        background: linear-gradient(90deg, #60a5fa 0%, #6366f1 50%, #3b82f6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .form-group {
        margin-bottom: 1.3rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #1e293b;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .form-control {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1.5px solid #cbd5e1;
        border-radius: 10px;
        font-size: 1rem;
        background: #f9fafb;
        color: #111827;
        transition: all 0.3s ease;
        outline: none;
    }
    
    .form-control:focus {
        border-color: #6366f1;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .form-hint {
        color: #cbd5e1;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }

    .btn-row {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .btn-aesthetic, .btn-back {
        flex: 1;
        text-align: center;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1.05rem;
        padding: 0.9rem 0;
        cursor: pointer;
        transition: all 0.25s ease;
        text-decoration: none;
        display: inline-block;
        border: none;
    }

    .btn-aesthetic {
        background: linear-gradient(90deg, #3b5b92 0%, #6366f1 100%);
        color: #fff;
        box-shadow: 0 4px 14px rgba(59, 91, 146, 0.35);
    }
    
    .btn-aesthetic:hover {
        background: linear-gradient(90deg, #6366f1 0%, #3b5b92 100%);
        transform: translateY(-2px) scale(1.02);
    }

    .btn-back {
        background: #f1f5f9;
        color: #374151;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    }
    
    .btn-back:hover {
        background: #6366f1;
        color: #fff;
    }

    @media (max-width: 600px) {
        .btn-row {
            flex-direction: column;
        }
    }
</style>

<div class="gallery-card">
    <h1>+ Tambah Berita Baru</h1>
    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Judul Berita <span style="color: #ef4444;">*</span></label>
            <input type="text" 
                   name="title" 
                   id="title" 
                   class="form-control"
                   value="{{ old('title') }}" 
                   required>
            @error('title')
                <span style="color:#ef4444;font-size:0.875rem;margin-top:0.25rem;display:block;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Konten Berita <span style="color: #ef4444;">*</span></label>
            <textarea name="content" 
                      id="content" 
                      class="form-control"
                      rows="8" 
                      required>{{ old('content') }}</textarea>
            @error('content')
                <span style="color:#ef4444;font-size:0.875rem;margin-top:0.25rem;display:block;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Gambar Berita</label>
            <input type="file" 
                   name="image" 
                   id="image" 
                   class="form-control"
                   accept="image/*">
            <span class="form-hint">Format: JPG, PNG, GIF. Max: 2MB</span>
            @error('image')
                <span style="color:#ef4444;font-size:0.875rem;margin-top:0.25rem;display:block;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="published_date">Tanggal Publish <span style="color: #ef4444;">*</span></label>
            <input type="date" 
                   name="published_date" 
                   id="published_date" 
                   class="form-control"
                   value="{{ old('published_date', date('Y-m-d')) }}" 
                   required>
            @error('published_date')
                <span style="color:#ef4444;font-size:0.875rem;margin-top:0.25rem;display:block;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status <span style="color: #ef4444;">*</span></label>
            <select name="status" 
                    id="status" 
                    class="form-control"
                    required>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
            @error('status')
                <span style="color:#ef4444;font-size:0.875rem;margin-top:0.25rem;display:block;">{{ $message }}</span>
            @enderror
        </div>

        <div class="btn-row">
            <button type="submit" class="btn-aesthetic">+ Simpan Berita</button>
            <a href="{{ route('news.index') }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>
@endsection
