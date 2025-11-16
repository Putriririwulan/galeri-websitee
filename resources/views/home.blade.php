@extends('layouts.app')

@section('content')
<h1>🎓 Galeri Sekolah</h1>
<div>
    @foreach($galleries as $gallery)
        <div>
            <h3>{{ $gallery->title }}</h3>
            <p>{{ $gallery->description }}</p>
            @if($gallery->cover_image)
                <img src="{{ asset('storage/'.$gallery->cover_image) }}" width="200">
            @endif
            <p>Kategori: {{ $gallery->category->name }}</p>
        </div>
    @endforeach
</div>
@endsection
