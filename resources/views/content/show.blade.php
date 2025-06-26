@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ $blog->title }}</h2>
    <div>
        <b>Kategori:</b> {{ $blog->category_name }} <br>
        @if(isset($blog->staff_name))
            <b>Yazar:</b> {{ $blog->staff_name }} <br> <!-- Eğer staff_name varsa yazar adını gösterir -->
        @endif
        <b>Yayın Tarihi:</b> 
        {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('d.m.Y H:i') : '-' }} <!-- Yayın tarihi varsa d.m.Y H:i formatında gösterir, yoksa '-' gösterir -->
        <br>
        <b>Durum:</b>
        @if($blog->status === 'pending')
            Onay Bekliyor <!-- Blog durumu "Onay Bekliyor" yazılır -->
        @elseif($blog->status === 'approved')
            Yayında <!-- Blog durumu "Yayında" yazılır -->
        @else
            Reddedildi <!-- Blog durumu  "Reddedildi" yazılır -->
        @endif
    </div>
    <hr>
    <div>{!! nl2br(e($blog->body)) !!}</div> <!-- Blog içeriğini satır sonlarını koruyarak ve güvenli şekilde ekrana basar -->
</div> <!-- nl2br islemi \n ile ikinci satir gecme islemini yaptiriyormus -->
@endsection
