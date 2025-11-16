@extends('layouts.user.app')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

body {
    background: #f8fafc;
    color: #1f2937;
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
}

.contact-container {
    max-width: 800px;
    margin: 2rem auto;
    padding: 0 1rem;
}

.contact-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 3rem 2.5rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    border: 2px solid #4f7cff;
}

.page-header {
    margin-bottom: 2rem;
}

.header-card {
    background: #ffffff;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 1.5rem;
    border: 2px solid #4f7cff;
}

.header-icon {
    background: #4f7cff;
    padding: 1rem;
    border-radius: 12px;
    color: white;
    font-size: 1.5rem;
    min-width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.header-content h1 {
    font-size: 1.75rem;
    font-weight: 700;
    margin: 0;
    color: #1f2937;
}

.header-accent {
    width: 80px;
    height: 4px;
    background: #4f7cff;
    margin-top: 0.75rem;
    border-radius: 2px;
}

.header-subtitle {
    color: #6b7280;
    font-size: 1rem;
    line-height: 1.6;
    margin-top: 1rem;
    margin-bottom: 0;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    color: #374151;
    font-weight: 600;
    font-size: 0.95rem;
}

.required {
    color: #ef4444;
}

.form-control {
    width: 100%;
    padding: 1rem;
    background: #ffffff;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    color: #1f2937;
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    transition: all 0.3s ease;
    box-sizing: border-box;
}

.form-control:focus {
    outline: none;
    border-color: #4f7cff;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(79, 124, 255, 0.1);
}

.form-control::placeholder {
    color: #9ca3af;
}

textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.btn-submit {
    width: 100%;
    padding: 1rem 2rem;
    background: #4f7cff;
    color: #ffffff;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Inter', sans-serif;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.btn-submit:hover {
    background: #3b5bdb;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(79, 124, 255, 0.3);
}

.alert {
    padding: 1rem 1.25rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
    font-weight: 500;
}

.alert-success {
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    color: #166534;
}

.alert-danger {
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #dc2626;
}

.error-message {
    color: #ef4444;
    font-size: 0.85rem;
    margin-top: 0.25rem;
    font-weight: 500;
}

.contact-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid #e5e7eb;
}

.info-item {
    text-align: center;
    padding: 1.5rem;
    background: #f8fafc;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
}

.info-icon {
    width: 50px;
    height: 50px;
    margin: 0 auto 0.75rem;
    background: #4f7cff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: white;
}

.info-label {
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.25rem;
    font-size: 0.9rem;
}

.info-value {
    color: #6b7280;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .contact-container {
        margin: 1rem;
        padding: 0 0.5rem;
    }
    
    .contact-card {
        padding: 2rem 1.5rem;
    }
    
    .header-card {
        padding: 1.5rem;
        flex-direction: column;
        text-align: center;
    }
    
    .header-content h1 {
        font-size: 1.5rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .contact-info {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .info-item {
        padding: 1rem;
    }
}
</style>

<div class="contact-container">
    <div class="page-header">
        <div class="header-card">
            <div class="header-icon">
                📧
            </div>
            <div class="header-content">
                <h1>Hubungi Kami</h1>
                <div class="header-accent"></div>
                <p class="header-subtitle">
                    Punya pertanyaan atau saran? Kirimkan pesan kepada kami dan tim kami akan segera merespons.
                </p>
            </div>
        </div>
    </div>

    <div class="contact-card">

    @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>⚠️ Terjadi kesalahan:</strong>
            <ul style="margin: 0.5rem 0 0 1.25rem; padding: 0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.contact.store') }}" method="POST">
        @csrf
        
        <div class="form-row">
            <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap <span class="required">*</span></label>
                <input type="text" 
                       class="form-control @error('name') is-invalid @enderror" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}"
                       placeholder="Masukkan nama lengkap Anda"
                       required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email <span class="required">*</span></label>
                <input type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}"
                       placeholder="nama@email.com"
                       required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="subject" class="form-label">Subjek <span class="required">*</span></label>
            <input type="text" 
                   class="form-control @error('subject') is-invalid @enderror" 
                   id="subject" 
                   name="subject" 
                   value="{{ old('subject') }}"
                   placeholder="Topik pesan Anda"
                   required>
            @error('subject')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="message" class="form-label">Pesan <span class="required">*</span></label>
            <textarea class="form-control @error('message') is-invalid @enderror" 
                      id="message" 
                      name="message" 
                      placeholder="Tulis pesan Anda di sini..."
                      required>{{ old('message') }}</textarea>
            @error('message')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
            </svg>
            Kirim Pesan
        </button>
    </form>
    </div>

    <div class="contact-info">
        <div class="info-item">
            <div class="info-icon">📍</div>
            <div class="info-label">Alamat</div>
            <div class="info-value">Jl. Raya Tajiur, Bogor</div>
        </div>
        
        <div class="info-item">
            <div class="info-icon">📞</div>
            <div class="info-label">Telepon</div>
            <div class="info-value">(0251) 8324589</div>
        </div>
        
        <div class="info-item">
            <div class="info-icon">✉️</div>
            <div class="info-label">Email</div>
            <div class="info-value">info@smkn4bogor-sch.id</div>
        </div>
    </div>
</div>
@endsection
