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
        min-height: 100px;
        resize: vertical;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 1.3rem;
    }

    .checkbox-group {
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 1.3rem;
    }

    .checkbox-group label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        color: #f1f5f9;
    }

    .checkbox-group input[type="checkbox"] {
        width: auto;
        cursor: pointer;
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

    input[type="date"],
    input[type="time"] {
        cursor: pointer;
    }
    
    input[type="date"]::-webkit-calendar-picker-indicator,
    input[type="time"]::-webkit-calendar-picker-indicator {
        cursor: pointer;
    }

    @media (max-width: 600px) {
        .btn-row, .form-row {
            flex-direction: column;
        }
    }
</style>

<div class="gallery-card">
    <h1>+ Tambah Agenda Baru</h1>
    <form action="{{ route('agendas.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="title">Judul Agenda <span style="color: #ef4444;">*</span></label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   class="form-control"
                   value="{{ old('title') }}"
                   placeholder="Contoh: Upacara Hari Kemerdekaan"
                   required>
            @error('title')
                <span style="color: #ef4444; font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi <span style="color: #ef4444;">*</span></label>
            <textarea id="description" 
                      name="description" 
                      class="form-control"
                      rows="6"
                      placeholder="Jelaskan detail agenda kegiatan..."
                      required>{{ old('description') }}</textarea>
            @error('description')
                <span style="color: #ef4444; font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row">
            <div>
                <label for="event_date">Tanggal Agenda <span style="color: #ef4444;">*</span></label>
                <input type="date" 
                       id="event_date" 
                       name="event_date" 
                       class="form-control"
                       value="{{ old('event_date') }}"
                       required>
                @error('event_date')
                    <span style="color: #ef4444; font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="event_time">Jam Agenda <span style="color: #ef4444;">*</span></label>
                <input type="time" 
                       id="event_time" 
                       name="event_time" 
                       class="form-control"
                       value="{{ old('event_time') }}"
                       required>
                @error('event_time')
                    <span style="color: #ef4444; font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="checkbox-group">
            <label>
                <input type="checkbox" 
                       name="is_published" 
                       value="1"
                       {{ old('is_published') ? 'checked' : '' }}>
                <span>Publikasikan agenda (tampilkan ke user)</span>
            </label>
        </div>

        <div class="btn-row">
            <button type="submit" class="btn-aesthetic">+ Simpan Agenda</button>
            <a href="{{ route('agendas.index') }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>
@endsection
