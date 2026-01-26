{{-- resources/views/layouts/portfolio.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Portfolio | Kz')</title>

  @vite('resources/css/portfolio.css')
</head>
<body>

  <header>
    <div class="container">
      <nav>
        <div class="logo">PORTOFOLIO</div>
        <div class="nav-links">
          <a href="#projects">Projects</a>
          <a href="#skills">Skills</a>
          <a href="#contact">Contact</a>
          <a href="#" id="loginBtn" class="btn outline">Login</a>
        </div>
      </nav>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    © 2026 Kz. Built with logic & coffee.
  </footer>

  {{-- LOGIN MODAL --}}
  <div class="modal" id="loginModal">
    <div class="login-box">
      <h3>Member Login</h3>
      <input type="text" placeholder="Username" />
      <input type="password" placeholder="Password" />
      <div class="login-actions">
        <button class="btn" onclick="fakeLogin()">Login</button>
        <button class="btn outline" onclick="closeLogin()">Cancel</button>
      </div>
      <div class="login-note">Demo only — no real authentication</div>
    </div>
  </div>

  <script>
    const loginBtn = document.getElementById('loginBtn');
    const loginModal = document.getElementById('loginModal');
    loginBtn.onclick = () => loginModal.classList.add('active');
    const closeLogin = () => loginModal.classList.remove('active');
    const fakeLogin = () => {
      alert('Login success (demo)');
      closeLogin();
    };
  </script>

</body>
</html>

{{-- resources/views/portfolio.blade.php --}}


@section('content')
<section class="hero container">
  <div class="hero-grid">
    <div>
      <div class="hero-actions">
        <a href="#projects" class="btn">View Projects</a>
        <a href="#contact" class="btn outline">Contact</a>
      </div>
    </div>
    <div class="hero-photo">
      <img src="{{ asset('foto.jpg') }}" alt="Profile Photo">
    </div>
  </div>
</section>
@endsection
