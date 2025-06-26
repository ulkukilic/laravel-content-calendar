
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    {{-- Sayfa başlığı --}}
    <h2>Yeni Blog Oluştur</h2>
    {{-- Blog oluşturma formu. Form gönderilince content.store route'una POST ile veri gider --}}
    <form method="POST" action="{{ route('content.store') }}">
        {{-- CSRF koruması için token --}}
        @csrf
        <div class="mb-3">
            {{-- Başlık girişi --}}
            <label for="title" class="form-label">Başlık</label>
            <input type="text" class="form-control" name="title" id="title" required maxlength="200">
        </div>
        <div class="mb-3">
            {{-- Kategori seçimi --}}
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-control" id="category_id" required>
                {{-- Veritabanından gelen kategoriler foreach ile tek tek listeleniyor --}}
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            {{-- İçerik metni --}}
            <label for="body" class="form-label">İçerik</label>
            <textarea name="body" class="form-control" id="body" rows="6" required></textarea>
        </div>
        <div class="mb-3">
            {{-- Yayın tarihi ve saati seçimi --}}
            <label for="scheduled_at" class="form-label">Yayın Tarihi</label>
            <input type="datetime-local" class="form-control" name="scheduled_at" id="scheduled_at" required>
        </div>
        {{-- Formu gönder butonu --}}
        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
</div>
@endsection
