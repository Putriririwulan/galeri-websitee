@extends('layouts.app')

@section('content')
<div style="margin-bottom: 2rem;">
    <div style="background: #ffffff; padding: 1.5rem; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); display: flex; align-items: center; gap: 1rem;">
        <div style="background: #4f7cff; padding: 0.75rem; border-radius: 8px; color: white; font-size: 1.25rem;">📰</div>
        <div>
            <h1 style="font-size: 1.5rem; font-weight: 700; margin: 0; color: #1f2937;">Edit Berita</h1>
            <div style="width: 60px; height: 3px; background: #4f7cff; margin-top: 0.5rem;"></div>
        </div>
    </div>
</div>

<div class="modern-form-container">
    <div class="form-header">
        <h3 class="form-title">Form Edit Berita</h3>
    </div>
    
    <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data" class="modern-form">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title" class="form-label">Judul Berita <span class="required">*</span></label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   class="form-input"
                   value="{{ old('title', $news->title) }}"
                   placeholder="Contoh: Kegiatan Sekolah Terbaru"
                   required>
            @error('title')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="content" class="form-label">Konten Berita <span class="required">*</span></label>
            <textarea id="content" 
                      name="content" 
                      class="form-textarea"
                      rows="8"
                      placeholder="Tulis konten berita di sini..."
                      required>{{ old('content', $news->content) }}</textarea>
            @error('content')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Gambar Berita</label>
            @if($news->image)
                <div class="current-image">
                    <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="preview-image">
                    <p class="image-info">Gambar saat ini</p>
                </div>
            @endif
            <input type="file" 
                   id="image" 
                   name="image" 
                   class="form-file"
                   accept="image/*">
            <p class="file-info">Format: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</p>
            @error('image')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="published_date" class="form-label">Tanggal Publish <span class="required">*</span></label>
                <input type="date" 
                       id="published_date" 
                       name="published_date" 
                       class="form-input"
                       value="{{ old('published_date', $news->published_date->format('Y-m-d')) }}"
                       required>
                @error('published_date')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status <span class="required">*</span></label>
                <select id="status" 
                        name="status" 
                        class="form-input"
                        required>
                    <option value="published" {{ old('status', $news->status) == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ old('status', $news->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
                @error('status')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="button-group">
            <button type="submit" class="btn-primary">
                <svg class="btn-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M5 13l4 4L19 7"/>
                </svg>
                Update Berita
            </button>
            <a href="{{ route('news.index') }}" class="btn-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>

<style>
/* Modern Form Styling */
.modern-form-container {
    background: #ffffff;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    margin: 0 auto;
    max-width: 800px;
    border: 1px solid #e5e7eb;
}

.form-header {
    margin-bottom: 2rem;
}

.form-title {
    color: #1f2937;
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0;
    font-family: 'Inter', sans-serif;
}

.modern-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-label {
    color: #374151;
    font-weight: 600;
    font-size: 0.95rem;
    margin-bottom: 0.5rem;
}

.required {
    color: #ef4444;
}

.form-input,
.form-textarea {
    background: #ffffff;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    padding: 1rem;
    font-size: 1rem;
    color: #1f2937;
    transition: all 0.3s ease;
    font-family: 'Inter', sans-serif;
}

.form-input:focus,
.form-textarea:focus {
    outline: none;
    border-color: #4f7cff;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(79, 124, 255, 0.1);
}

.form-textarea {
    resize: vertical;
    min-height: 150px;
}

.form-file {
    background: #ffffff;
    border: 2px dashed #e5e7eb;
    border-radius: 8px;
    padding: 1rem;
    font-size: 1rem;
    color: #1f2937;
    transition: all 0.3s ease;
    cursor: pointer;
}

.form-file:hover {
    border-color: #4f7cff;
    background: #f8fafc;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.current-image {
    margin-bottom: 1rem;
}

.preview-image {
    width: 200px;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
    border: 2px solid #e5e7eb;
}

.image-info {
    font-size: 0.85rem;
    color: #6b7280;
    margin-top: 0.5rem;
    margin-bottom: 0;
}

.file-info {
    font-size: 0.85rem;
    color: #6b7280;
    margin-top: 0.5rem;
    margin-bottom: 0;
}

.button-group {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 1px solid #e5e7eb;
}

.btn-primary {
    background: #4f7cff;
    color: #ffffff;
    border: none;
    border-radius: 8px;
    padding: 1rem 2rem;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    font-family: 'Inter', sans-serif;
}

.btn-primary:hover {
    background: #3b5bdb;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(79, 124, 255, 0.3);
}

.btn-secondary {
    background: #ffffff;
    color: #6b7280;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    padding: 1rem 2rem;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    font-family: 'Inter', sans-serif;
}

.btn-secondary:hover {
    background: #f9fafb;
    border-color: #d1d5db;
    text-decoration: none;
    color: #374151;
}

.btn-icon {
    width: 20px;
    height: 20px;
}

.error-message {
    color: #ef4444;
    font-size: 0.85rem;
    margin-top: 0.25rem;
    font-weight: 500;
}

/* Fix text selection and ensure text is always black */
.form-input,
.form-textarea {
    color: #1f2937 !important;
}

.form-input::selection,
.form-textarea::selection {
    background-color: rgba(79, 124, 255, 0.2);
    color: #1f2937 !important;
}

.form-input::-moz-selection,
.form-textarea::-moz-selection {
    background-color: rgba(79, 124, 255, 0.2);
    color: #1f2937 !important;
}

/* Ensure placeholder text is visible */
.form-input::placeholder,
.form-textarea::placeholder {
    color: #9ca3af !important;
    opacity: 1;
}

/* Responsive Design */
@media (max-width: 768px) {
    .modern-form-container {
        margin: 1rem;
        padding: 1.5rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .button-group {
        flex-direction: column;
    }
    
    .btn-primary,
    .btn-secondary {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endsection
