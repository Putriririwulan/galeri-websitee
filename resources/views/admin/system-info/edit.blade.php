@extends('layouts.app')

@section('content')
<div class="container" style="max-width:800px;margin:0 auto;padding:2rem;">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:2rem;">
        <h1 style="color:#f1f5f9;font-size:1.75rem;font-weight:700;">⚙️ Edit Informasi Sistem</h1>
        <a href="{{ route('admin.dashboard') }}" style="color:#94a3b8;text-decoration:none;font-size:0.9rem;font-weight:500;">← Kembali</a>
    </div>

    @if(session('success'))
        <div style="padding:1rem 1.5rem;border-radius:10px;margin-bottom:1.5rem;background:rgba(34,197,94,0.1);border:1px solid #22c55e;color:#22c55e;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <form action="{{ route('system-info.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom:1.5rem;">
                <label for="system_name" style="display:block;margin-bottom:0.5rem;color:#f1f5f9;font-weight:500;">Nama Sistem *</label>
                <input type="text" name="system_name" id="system_name" value="{{ old('system_name', $systemInfo->system_name) }}" required
                    style="width:100%;padding:0.75rem 1rem;background:#ffffff;border:1px solid #d1d5db;border-radius:10px;color:#1f2937;">
                @error('system_name')
                    <span style="color:#ef4444;font-size:0.875rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom:1.5rem;">
                <label for="system_version" style="display:block;margin-bottom:0.5rem;color:#f1f5f9;font-weight:500;">Versi Sistem *</label>
                <input type="text" name="system_version" id="system_version" value="{{ old('system_version', $systemInfo->system_version) }}" required
                    style="width:100%;padding:0.75rem 1rem;background:#ffffff;border:1px solid #d1d5db;border-radius:10px;color:#1f2937;">
                @error('system_version')
                    <span style="color:#ef4444;font-size:0.875rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom:1.5rem;">
                <label for="database_type" style="display:block;margin-bottom:0.5rem;color:#f1f5f9;font-weight:500;">Tipe Database *</label>
                <input type="text" name="database_type" id="database_type" value="{{ old('database_type', $systemInfo->database_type) }}" required
                    style="width:100%;padding:0.75rem 1rem;background:#ffffff;border:1px solid #d1d5db;border-radius:10px;color:#1f2937;">
                @error('database_type')
                    <span style="color:#ef4444;font-size:0.875rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom:1.5rem;">
                <label for="status" style="display:block;margin-bottom:0.5rem;color:#f1f5f9;font-weight:500;">Status Sistem *</label>
                <select name="status" id="status" required
                    style="width:100%;padding:0.75rem 1rem;background:#ffffff;border:1px solid #d1d5db;border-radius:10px;color:#1f2937;">
                    <option value="aktif" {{ old('status', $systemInfo->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="maintenance" {{ old('status', $systemInfo->status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
                @error('status')
                    <span style="color:#ef4444;font-size:0.875rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="padding:1.5rem;background:#0f172a;border-radius:10px;margin-bottom:1.5rem;">
                <h3 style="color:#f1f5f9;font-size:1rem;font-weight:600;margin-bottom:1rem;">ℹ️ Informasi Otomatis</h3>
                <div style="display:grid;gap:0.75rem;">
                    <div>
                        <span style="color:#64748b;font-size:0.85rem;">Framework:</span>
                        <span style="color:#f1f5f9;font-weight:500;margin-left:0.5rem;">Laravel {{ app()->version() }}</span>
                    </div>
                    <div>
                        <span style="color:#64748b;font-size:0.85rem;">PHP Version:</span>
                        <span style="color:#f1f5f9;font-weight:500;margin-left:0.5rem;">{{ phpversion() }}</span>
                    </div>
                    <div>
                        <span style="color:#64748b;font-size:0.85rem;">Server Time:</span>
                        <span style="color:#f1f5f9;font-weight:500;margin-left:0.5rem;">{{ now()->format('d M Y, H:i:s') }}</span>
                    </div>
                </div>
            </div>

            <div style="display:flex;gap:1rem;margin-top:2rem;">
                <button type="submit" class="btn" style="background:#3b82f6;color:#fff;padding:0.75rem 2rem;border-radius:10px;border:none;font-weight:600;cursor:pointer;">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.dashboard') }}" style="background:#64748b;color:#fff;padding:0.75rem 2rem;border-radius:10px;text-decoration:none;font-weight:600;display:inline-block;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
