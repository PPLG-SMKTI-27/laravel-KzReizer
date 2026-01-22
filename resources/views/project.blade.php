@extends('layouts.app')

@section('title', 'Project - LuxAuto')

@section('content')
  <section class="hero">
    <h1>{{ $project['tagline'] }}</h1>
    <p>{{ $project['desc'] }}</p>
  </section>

  <section class="profile">
    <h2>Profil Dealer</h2>
    <p>{{ $project['profil'] }}</p>

    <a href="{{ route('index') }}" class="btn">Portofolio saya</a>
  </section>
@endsection
