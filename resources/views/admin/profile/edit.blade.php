@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    
    * {
        font-family: 'Poppins', sans-serif;
    }

    .profile-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .profile-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .profile-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }

    .profile-header p {
        color: #64748b;
        margin: 0.25rem 0 0 0;
        font-size: 0.9rem;
    }

    .btn-back {
        background: white;
        color: #1e293b;
        border: 1px solid #e5e5e5;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s;
    }

    .btn-back:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
    }

    .profile-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .profile-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .profile-card-header {
        background: #1e293b;
        color: white;
        padding: 1.25rem 1.5rem;
        font-weight: 600;
        font-size: 1rem;
    }

    .profile-card-body {
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

    .profile-photo-section {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .profile-photo-wrapper {
        margin-bottom: 1rem;
    }

    .profile-photo {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #e5e5e5;
    }

    .file-input-wrapper {
        position: relative;
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    .file-input-label {
        display: inline-block;
        padding: 0.6rem 1.2rem;
        background: white;
        border: 1px solid #e5e5e5;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 500;
        font-size: 0.9rem;
        color: #1e293b;
        transition: all 0.2s;
    }

    .file-input-label:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
    }

    .file-hint {
        color: #64748b;
        font-size: 0.85rem;
        margin-top: 0.5rem;
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

    .btn-danger {
        background: #ef4444;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-danger:hover {
        background: #dc2626;
    }

    .delete-section {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e5e5e5;
    }

    .delete-section h3 {
        color: #ef4444;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .delete-section p {
        color: #64748b;
        font-size: 0.9rem;
        margin-bottom: 1rem;
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

    @media (max-width: 768px) {
        .profile-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="profile-container">
    <div class="profile-header">
        <div>
            <h1>Kelola profil dan pengaturan sistem</h1>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn-back">
            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="profile-grid">
        <!-- Left Column: Profile Info -->
        <div class="profile-card">
            <div class="profile-card-header">
                Informasi Profil
            </div>
            <div class="profile-card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="profile-photo-section">
                        <div class="profile-photo-wrapper">
                            <img src="{{ $admin->profile_photo ? asset('storage/' . $admin->profile_photo) : asset('images/default-avatar.svg') }}" 
                                 alt="Profile Photo" 
                                 id="profilePreview"
                                 class="profile-photo">
                        </div>
                        
                        <div class="file-input-wrapper">
                            <label for="profile_photo" class="file-input-label">
                                Choose File
                            </label>
                            <input type="file" 
                                   id="profile_photo" 
                                   name="profile_photo" 
                                   accept="image/*"
                                   style="display: none;"
                                   onchange="previewImage(event)">
                        </div>
                        
                        <p class="file-hint">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB</p>
                        
                        @error('profile_photo')
                            <span style="color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               class="form-control"
                               value="{{ old('name', $admin->name ?? $admin->username) }}">
                        @error('name')
                            <span style="color: #ef4444; font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" 
                               id="username" 
                               name="username" 
                               class="form-control"
                               value="{{ old('username', $admin->username) }}"
                               required>
                        @error('username')
                            <span style="color: #ef4444; font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="form-control"
                               value="{{ old('email', $admin->email ?? '') }}">
                        @error('email')
                            <span style="color: #ef4444; font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn-primary">
                        <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Profil
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Column: Delete Account -->
        <div>
            <!-- Delete Account Card -->
            <div class="profile-card">
                <div class="profile-card-header" style="background: #ef4444;">
                    Zona Bahaya
                </div>
                <div class="profile-card-body">
                    <div class="delete-section" style="margin-top: 0; padding-top: 0; border-top: none;">
                        <h3>Hapus Akun</h3>
                        <p>Menghapus akun akan menghapus semua data yang terkait dengan akun ini. Tindakan ini tidak dapat dibatalkan.</p>
                        <button type="button" class="btn-danger" onclick="return confirm('Yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan!')">
                            <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus Akun
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
    
    function deletePhoto() {
        if (confirm('Yakin ingin menghapus foto profil?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("admin.profile.delete-photo") }}';
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            
            form.appendChild(csrfToken);
            form.appendChild(methodField);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endsection
