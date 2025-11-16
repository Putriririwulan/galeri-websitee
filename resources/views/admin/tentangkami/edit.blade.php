@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Tentang Kami</h2>
    <form action="{{ route('admin.tentangkami.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Sejarah</label>
            <textarea name="sejarah" class="form-control" rows="5">{{ $data->sejarah }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Visi</label>
            <textarea name="visi" class="form-control" rows="3">{{ $data->visi }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Misi</label>
            <textarea name="misi" class="form-control" rows="5">{{ $data->misi }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">💾 Simpan</button>
        <a href="{{ route('admin.tentangkami.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
