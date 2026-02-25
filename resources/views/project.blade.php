@extends('layouts.luxauto')

@section('title', 'Project - LuxAuto')

@section('content')
  <section class="hero">
    <h1>Luxury Car, Premium Experienece</h1>
    <p>Dealer mobil terpercaya, dan menyediakan berbagai kendaraan ekslusif untuk memenuhi kebutuhan anda</p>
    
  </section>

  <section class="profile">
    <h2>Profil Dealer</h2>
    <p>LuxAuto adalah dealer mobil mewah yang menyediakan berbagai pilihan kendaraan eksklusif untuk memenuhi kebutuhan pelanggan yang menginginkan pengalaman berkendara yang luar biasa. Kami berkomitmen untuk memberikan layanan terbaik dan memastikan setiap pelanggan mendapatkan mobil impian mereka dengan kualitas dan pelayanan yang tak tertandingi.</p>

    <button class="btn-primary" onclick="window.location.href='{{ route('index') }}'">portfolio saya</button>
  </section>
@endsection