@extends('layouts.app')

@section('title', 'Project - LuxAuto')

@section('content')
  <section class="hero">
    <h1>Luxury Cars, Premium Experience</h1>
    <p>Dealer mobil mewah terpercaya</p>
  </section>

  <section class="profile">
    <h2>Profil Dealer</h2>
    <p>Ini halaman project</p>

    <a href="{{ route('index') }}" class="btn">Portofolio saya</a>
  </section>
@endsection
