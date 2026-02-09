{{-- ================= REGISTER ================= --}}
<x-guest-layout>

<div class="form-wrap panel">

  <h1 class="title">Register</h1>

  <form method="POST" action="{{ route('register') }}">
    @csrf

    <label>Nama</label>
    <input type="text" name="name" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Password</label>
    <input type="password" name="password" required>

    
    <label>Konfirmasi Password</label>
    <input type="password" name="password_confirmation" required>

    <a href="{{ route('login') }}">sudah punya akun?klik disni<br></a>
    <br>
    <button class="primary">Daftar</button>

  </form>

</div>

</x-guest-layout>
