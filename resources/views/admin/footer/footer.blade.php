@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Footer</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.footer.update') }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="content" class="form-label">Isi Footer</label>
            <textarea name="content" id="content" class="form-control" rows="6">{{ $footer->content ?? '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
