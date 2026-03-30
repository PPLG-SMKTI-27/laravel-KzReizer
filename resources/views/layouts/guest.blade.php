<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }} - {{ $title ?? 'Authentication' }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    
    @stack('styles')
</head>
<body>
    {{ $slot }}
    
    @if(session('error'))
    <div class="error-message" style="position: fixed; top: 20px; right: 20px; max-width: 300px;">
        {{ session('error') }}
    </div>
    @endif
    
    @if(session('success'))
    <div class="success-message" style="position: fixed; top: 20px; right: 20px; max-width: 300px;">
        {{ session('success') }}
    </div>
    @endif
    
    <script>
        // Auto hide messages after 5 seconds
        setTimeout(() => {
            document.querySelectorAll('.error-message, .success-message').forEach(el => {
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 300);
            });
        }, 5000);
    </script>
</body>
</html>