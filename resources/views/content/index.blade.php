@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Bloglar</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('content.create') }}" class="btn btn-primary mb-3">Yeni Blog Oluştur</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Başlık</th>
                <th>Kategori</th>
                <th>Durum</th>
                <th>Yayınlanma Tarihi</th>
                @if(session('role') === 'admin')
                    <th>Personel</th>
                @endif
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td><a href="{{ route('content.show', $blog->id) }}">{{ $blog->title }}</a></td>
                <td>{{ $blog->category_name }}</td>
                <td>
                    @if($blog->status === 'pending')
                        Onay Bekliyor
                    @elseif($blog->status === 'approved')
                        Yayında
                    @else
                        Reddedildi
                    @endif
                </td>
                <td>{{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('d.m.Y H:i') : '-' }}</td>
                @if(isset($blog->staff_name))
                    <td>{{ $blog->staff_name }}</td>
                @endif
                <td>
                    @if(session('role') === 'staff' && $blog->status !== 'approved')
                        <a href="{{ route('content.edit', $blog->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
