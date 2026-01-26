<!DOCTYPE html>
<html>
<head>
    <title>Login - LuxAuto</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            
            @if ($errors->any())
              <div class="error-message">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
              @csrf
              
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
              </div>

              <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>