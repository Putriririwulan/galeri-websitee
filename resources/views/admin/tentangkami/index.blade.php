@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h2>Tentang Kami</h2>
    @if($data)
        <div class="card p-3">
            <h5><b>Sejarah:</b></h5>
            <p>{{ $data->sejarah }}</p>
            <h5><b>Visi:</b></h5>
            <p>{{ $data->visi }}</p>
            <h5><b>Misi:</b></h5>
            <p>{{ $data->misi }}</p>

            <a href="{{ route('admin.tentangkami.edit', $data->id) }}" class="btn btn-primary">✏️ Edit</a>
        </div>
    @else
        <p>Belum ada data Tentang Kami.</p>
    @endif
</div>
@endsection
