@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    
    * {
        font-family: 'Poppins', sans-serif;
    }

    .password-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 2rem;
    }

    .password-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .password-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }

    .password-subtitle {
        color: #64748b;
        margin-bottom: 2rem;
        font-size: 0.9rem;
    }

    .password-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .password-card-header {
        background: #1e293b;
        color: white;
        padding: 1.25rem 1.5rem;
        font-weight: 600;
        font-size: 1rem;
    }

    .password-card-body {
        padding: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #1e293b;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #e5e5e5;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.2s;
        background: white;
        color: #1e293b;
    }

    .form-control:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .info-box {
        background: rgba(59, 130, 246, 0.05);
        border: 1px solid rgba(59, 130, 246, 0.2);
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .info-box-header {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #3b82f6;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .info-box ul {
        color: #64748b;
        font-size: 0.85rem;
        margin: 0;
        padding-left: 1.25rem;
    }

    .info-box li {
        margin-bottom: 0.25rem;
    }

    .btn-primary {
        background: #1e293b;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary:hover {
        background: #334155;
    }

    .btn-secondary {
        background: #64748b;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-secondary:hover {
        background: #475569;
    }

    .button-group {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
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
    }

    .alert-danger {
        background: linear-gradient(135deg, #991b1b 0%, #ef4444 100%);
        color: #fff;
        border-radius: 10px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        font-weight: 500;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .alert-danger ul {
        margin: 0;
        padding-left: 1.5rem;
    }
</style>

<div class="password-container">
    <div class="password-header">
        <svg style="width: 32px; height: 32px; color: #ef4444;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
        </svg>
        <h1>Ganti Password</h1>
    </div>
    <p class="password-subtitle">Ubah password akun admin Anda</p>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="password-card">
        <div class="password-card-header">
            Form Ganti Password
        </div>
        
        <div class="password-card-body">
            <form action="{{ route('admin.profile.update-password') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="current_password">Password Lama <span style="color: #ef4444;">*</span></label>
                    <input type="password" 
                           id="current_password" 
                           name="current_password" 
                           class="form-control"
                           placeholder="Masukkan password lama"
                           required>
                    @error('current_password')
                        <span style="color: #ef4444; font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password">Password Baru <span style="color: #ef4444;">*</span></label>
                    <input type="password" 
                           id="new_password" 
                           name="new_password" 
                           class="form-control"
                           placeholder="Masukkan password baru (min. 6 karakter)"
                           required>
                    @error('new_password')
                        <span style="color: #ef4444; font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Konfirmasi Password Baru <span style="color: #ef4444;">*</span></label>
                    <input type="password" 
                           id="new_password_confirmation" 
                           name="new_password_confirmation" 
                           class="form-control"
                           placeholder="Ulangi password baru"
                           required>
                </div>

                <div class="info-box">
                    <div class="info-box-header">
                        <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Tips Password Aman:
                    </div>
                    <ul>
                        <li>Minimal 6 karakter</li>
                        <li>Kombinasi huruf besar dan kecil</li>
                        <li>Tambahkan angka dan simbol</li>
                        <li>Jangan gunakan password yang mudah ditebak</li>
                    </ul>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn-primary">
                        <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7"/>
                        </svg>
                        Ubah Password
                    </button>
                    <a href="{{ route('admin.profile.edit') }}" class="btn-secondary">
                        <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
