{{-- resources/views/dash/staff.blade.php --}}
@extends('layouts.staff')

@section('title', 'Personel Paneli')
@section('page_title', 'Hoşgeldin, ' . session('full_name') . '!')

@section('content')
  <div class="alert alert-info">
    Personel paneline hoşgeldiniz!  </div>
@endsection
