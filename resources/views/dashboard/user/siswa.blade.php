@extends('layouts.app')
@section('content')
  <div class="container">
    <h2>Selamat Datang, {{ Auth::user()->name }}</h2>
    <ul>
      <li><a href="#">Lihat Jadwal</a></li>
      <li><a href="#">Kalender Akademik</a></li>
      <li><a href="#">Pembayaran</a></li>
      <li><a href="#">Keluh Kesah</a></li>
    </ul>
  </div>
@endsection
