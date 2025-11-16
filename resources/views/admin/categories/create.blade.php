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

    .category-section {
        max-width: 500px;
        margin: 3rem auto;
        padding: 2.5rem 2rem;
        background: rgba(255,255,255,0.06);
        border-radius: 16px;
        backdrop-filter: blur(8px);
        box-shadow: 0 6px 24px rgba(0,0,0,0.3);
        animation: fadeIn 0.7s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(40px);}
        to { opacity: 1; transform: none;}
    }

    .category-section h1 {
        font-size: 1.8rem;
        margin-bottom: 2rem;
        text-align: center;
        font-weight: 700;
        background: linear-gradient(90deg, #60a5fa 0%, #6366f1 50%, #3b82f6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .form-group {
        margin-bottom: 1.5rem;
        text-align: center;
    }
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #1e293b;
        font-weight: 600;
        text-align: left;
    }
    .form-control {
        width: 95%;
        max-width: 420px; /* panjangin dikit */
        padding: 0.7rem 1rem;
        border: 1.5px solid #cbd5e1;
        border-radius: 10px;
        font-size: 1rem;
        background: #f9fafb;
        color: #111827;
        transition: all 0.3s ease;
        display: block;
        margin: auto;
    }
    .form-control:focus {
        border-color: #6366f1;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
        outline: none;
    }

    /* Tombol */
    .btn-row {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 1rem;
    }
    .btn-save {
        flex: 1;
        background: linear-gradient(90deg, #3b5b92 0%, #6366f1 100%);
        color: #fff;
        border: none;
        padding: 0.9rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        box-shadow: 0 6px 16px rgba(59, 91, 146, 0.35);
        transition: all 0.25s ease;
        text-align: center;
    }
    .btn-save:hover {
        background: linear-gradient(90deg, #6366f1 0%, #3b5b92 100%);
        transform: translateY(-2px) scale(1.02);
    }
    .btn-back {
        flex: 1;
        background: #f3f4f6;
        color: #374151;
        border: none;
        padding: 0.9rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: all 0.25s ease;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }
    .btn-back:hover {
        background: #6366f1;
        color: #fff;
    }
</style>

<div class="category-section">
    <h1>+ Tambah Kategori</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="btn-row">
            <button type="submit" class="btn-save">Simpan</button>
            <a href="{{ route('categories.index') }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>
@endsection
