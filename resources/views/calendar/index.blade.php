@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Takvim</h2>
        @if(session('role') === 'admin')
            <p>Tüm çalışanların randevuları listeleniyor.</p>
        @else
            <p>Kendi randevularınızı görebilirsiniz.</p>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Başlık</th>
                    <th>Notlar</th>
                    <th>Tarih</th>
                    @if(session('role') === 'admin')
                        <th>Çalışan</th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->title }}</td>
                    <td>{{ $appointment->notes }}</td>
                    <td>{{ $appointment->date }}</td>
                    @if(isset($appointment->staff_name))
                        <td>{{ $appointment->staff_name }}</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
