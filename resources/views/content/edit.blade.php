
@extends('layouts.app')


@section('content')
<div class="container mt-4">
    {{-- Sayfa başlığı --}}
    <h2>Blogu Düzenle</h2>
    {{-- Düzenleme formu: Form gönderilince content.update route'una, blogun id'si ile POST yapılır --}}
    <form method="POST" action="{{ route('content.update', $blog->id) }}">
        @csrf {{-- CSRF koruması --}}
        <div class="mb-3">
            {{-- Blog başlığı düzenleme alanı, mevcut başlık otomatik doldurulur --}}
            <label for="title" class="form-label">Başlık</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $blog->title }}" required maxlength="200">
        </div>
        <div class="mb-3">
            {{-- Kategori seçimi, mevcut kategori seçili olarak gelir --}}
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-control" id="category_id" required>
                {{-- Tüm kategoriler listelenir, eğer kategori id'si mevcut blogun kategori id'sine eşitse "selected" olur --}}
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            {{-- Blog içeriğini düzenleme alanı, mevcut içerik otomatik doldurulur --}}
            <label for="body" class="form-label">İçerik</label>
            <textarea name="body" class="form-control" id="body" rows="6" required>{{ $blog->body }}</textarea>
        </div>
        <div class="mb-3">
            {{-- Yayın tarihini düzenleme alanı, mevcut tarih otomatik olarak doğru formatta doldurulur --}}
            <label for="scheduled_at" class="form-label">Yayın Tarihi</label>
            <input type="datetime-local" class="form-control" name="scheduled_at" id="scheduled_at"
                value="{{ \Carbon\Carbon::parse($blog->scheduled_at)->format('Y-m-d\TH:i') }}" required>
        </div>
        {{-- Formu gönder butonu --}}
        <button type="submit" class="btn btn-success">Güncelle</button>
    </form>
</div>
@endsection
