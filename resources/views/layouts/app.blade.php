<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@vite(['resources/css/dashboard.css','resources/js/app.js'])
</head>

<body>

<div class="sidebar">
  <h2>Lux Panel</h2>
  <a href="{{ route('profile.edit') }}">Profile</a>
  <a href="{{ route('index') }}">portofolio</a>
  <a href="{{ route('project') }}">project luxauto</a>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button>Logout</button>
  </form>
</div>

<div class="main">
  <div class="panel">
    {{ $slot }}
  </div>
</div>

</body>
</html>
