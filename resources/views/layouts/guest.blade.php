<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@vite(['resources/css/dashboard.css','resources/js/app.js'])
</head>

<body>

<div class="form-wrapper panel">
  {{ $slot }}
</div>

</body>
</html>
