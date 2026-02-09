{{-- ================= LOGIN ================= --}}
<x-guest-layout>

<div class="form-wrap panel">

  <h1 class="title">Login</h1>

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <div style="margin:10px 0;">
      <input type="checkbox" name="remember" style="width:auto;">
      <span> Remember me</span>
    </div>

    <a href="{{ route('register') }}">belom punya akun? klik disini</a>
    <br><br>
    <button class="primary">Masuk</button>

    <p class="helper">
      <a href="{{ route('password.request') }}">Lupa password?</a>
    </p>

  </form>

</div>

</x-guest-layout>
