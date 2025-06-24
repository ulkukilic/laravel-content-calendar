<!-- resources/views/dash/admin.blade.php -->
@extends('layouts.admin')

@section('title','Admin Paneli')
@section('page_title','Hoşgeldin, ' . session('name') . '!')

@section('content')
  <div class="alert alert-success">
    Admin Paneline Hoşgeldiniz!
  </div>
@endsection
