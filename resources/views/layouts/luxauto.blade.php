<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'LuxAuto')</title>

  @vite('resources/css/app.css')
</head>
<body>

  <div class="warning-bar">
    <div class="warn">!! Warning Masih Dalam Tahap Pengembangan !!</div>
  </div>

  <header class="navbar">
    <div class="logo">Lux<span>Auto</span></div>

    <nav class="nav-menu">
      <a href="#">Home</a>
      <a href="#">Cars</a>
      <a href="#">Brands</a>
      <a href="#">Services</a>
      <a href="#">Promo</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
    </nav>


  </header>

  <main>
    @yield('content')
  </main>

</body>
</html>