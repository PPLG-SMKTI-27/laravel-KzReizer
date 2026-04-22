<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'LuxAuto')</title>

@vite('resources/css/app.css')
</head>
<body class="dealer-body">
  <header class="dealer-header">
    <a class="dealer-logo" href="{{ route('shop.index') }}">Lux<span>Auto</span></a>

    <nav class="dealer-nav">
      <a href="{{ route('shop.index') }}">Katalog</a>
      <a href="{{ route('shop.index', ['condition' => 'new']) }}">Mobil Baru</a>
      <a href="{{ route('shop.index', ['condition' => 'used']) }}">Mobil Bekas</a>
      @auth
        @if(auth()->user()->role === 'admin')
          <a href="{{ route('dashboard') }}">Dashboard</a>
        @endif
      @endauth
    </nav>
  </header>

  <main class="dealer-main">
    @if(session('success'))
      <div class="flash flash-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="flash flash-error">{{ session('error') }}</div>
    @endif
    @yield('content')
  </main>

  <footer class="dealer-footer">
    <p>LuxAuto Dealer Platform</p>
    <p>Siap dipakai operasional penjualan mobil.</p>
  </footer>
</body>
</html>
