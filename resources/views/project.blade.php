@extends('layouts.luxauto')

@section('title', 'Project - LuxAuto')

@section('content')
  <section class="hero">
    <h1>{{ $project['tagline'] }}</h1>
    <p>{{ $project['desc'] }}</p>
  </section>

  <section class="profile">
    <h2>Profil Dealer</h2>
    <p>{{ $project['profil'] }}</p>

    <button class="btn-primary" onclick="window.location.href='{{ route('index') }}'">portfolio saya</button>
  </section>
@endsection