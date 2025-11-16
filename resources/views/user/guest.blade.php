@extends('layouts.app')

@section('content')
<div style="text-align:center; margin-top:50px;">
    <h1>👋 Selamat Datang, Pengunjung!</h1>
    <p>Kamu sedang berada di halaman Guest (tanpa login).</p>

    <a href="{{ route('homepage') }}" 
       style="padding:10px 20px; background:#6366f1; color:#fff; border-radius:8px; text-decoration:none;">
       Lihat Galeri
    </a>
</div>
@endsection
