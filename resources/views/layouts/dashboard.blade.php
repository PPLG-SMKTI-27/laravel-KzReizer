<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    @vite(['resources/css/dashboard.css', 'resources/js/app.js'])
</head>
<body class="admin-body">

<div class="admin-wrapper">

    <aside class="sidebar">
        <h2 class="logo">LuxPanel</h2>

        <a href="{{ route('skills.index') }}">Skills</a>
        <a href="{{ route('projects.index') }}">Projects</a>
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </aside>

<main class="main-content">
    @if(session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-error mb-4">
        {{ session('error') }}
    </div>
    @endif

    @yield('content')
</main>

</div>

</body>
</html>