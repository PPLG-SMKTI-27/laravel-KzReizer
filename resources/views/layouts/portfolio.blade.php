{{-- resources/views/layouts/portfolio.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Portfolio | Kz')</title>

  @vite('resources/css/portfolio.css')
  
  {{-- Tambahkan Font Awesome untuk icon (opsional) --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

  <header>
    <div class="container">
      <nav>
        <div class="logo">
          <a href="/" style="text-decoration: none; color: inherit;">Portofolio</a>
        </div>
        
        <div class="nav-links">
          <a href="#projects">Projects</a>
          <a href="#skills">Skills</a>
          <a href="#contact">Contact</a>
          
          {{-- TOMBOL LOGOUT UNTUK USER YANG LOGIN --}}
          @auth
            <div class="user-menu">
              @if(auth()->user()->role === 'admin')
                <a href="{{ route('dashboard') }}" class="admin-link">
                  <i class="fas fa-cog"></i>
                  <span>Admin</span>
                </a>
              @endif
              
              <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">
                  <i class="fas fa-sign-out-alt"></i>
                  <span>Logout</span>
                </button>
              </form>
            </div>
          @else
            {{-- TOMBOL LOGIN UNTUK USER YANG BELUM LOGIN --}}
            <a href="{{ route('login') }}" class="login-link">
              <i class="fas fa-sign-in-alt"></i>
              <span>Login</span>
            </a>
          @endauth
        </div>
        
        {{-- Mobile Menu Button --}}
        <button class="mobile-menu-btn" id="mobileMenuBtn">
          <i class="fas fa-bars"></i>
        </button>
      </nav>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    <div class="container">
      <p>© 2026 Portfolio. All rights reserved.</p>
    </div>
  </footer>

  {{-- Mobile Menu Script --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const mobileMenuBtn = document.getElementById('mobileMenuBtn');
      const navLinks = document.querySelector('.nav-links');
      
      if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
          navLinks.classList.toggle('active');
          
          // Ubah icon
          const icon = this.querySelector('i');
          if (navLinks.classList.contains('active')) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
          } else {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
          }
        });
      }
      
      // Tutup menu saat klik di luar
      document.addEventListener('click', function(event) {
        if (!event.target.closest('nav') && navLinks.classList.contains('active')) {
          navLinks.classList.remove('active');
          const icon = mobileMenuBtn.querySelector('i');
          icon.classList.remove('fa-times');
          icon.classList.add('fa-bars');
        }
      });
    });
  </script>

  {{-- Toast Notification untuk Session Messages --}}
  @if(session('success') || session('error'))
  <div class="toast-notification {{ session('success') ? 'success' : 'error' }}" id="toast">
    <div class="toast-content">
      <i class="fas {{ session('success') ? 'fa-check-circle' : 'fa-exclamation-circle' }}"></i>
      <span>{{ session('success') ?? session('error') }}</span>
    </div>
    <button class="toast-close" onclick="this.parentElement.remove()">&times;</button>
  </div>
  
  <script>
    setTimeout(() => {
      const toast = document.getElementById('toast');
      if (toast) {
        toast.style.animation = 'slideOut 0.3s ease forwards';
        setTimeout(() => toast.remove(), 300);
      }
    }, 5000);
  </script>
  @endif
</body>
</html>