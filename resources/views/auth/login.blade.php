{{-- ================= LOGIN ================= --}}
<x-guest-layout>
@vite('resources/css/auth.css')
<div class="form-wrap panel">

  <h1 class="title">Welcome</h1>
  
  @if($errors->any())
  <div class="error-message">
    @foreach($errors->all() as $error)
      <div>{{ $error }}</div> 
    @endforeach
  </div>
  @endif

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
      <label for="email">Email Address</label>
      <input 
        type="email" 
        name="email" 
        id="email"
        value="{{ old('email') }}"
        required 
        autofocus
        placeholder="your@email.com"
      >
      @error('email')
        <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="password">Password</label>
      <input 
        type="password" 
        name="password" 
        id="password"
        required
        placeholder="••••••••"
      >
      @error('password')
        <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <div class="remember-me">
      <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      <label for="remember" style="display: inline; margin: 0;">Remember me</label>
    </div>

    <div style="text-align: right; margin-bottom: 0.5rem;">
      <a href="{{ route('password.request') }}">Forgot password?</a>
    </div>

    <button type="submit" class="primary">
      <span>Sign In</span>
    </button>

    <div class="divider">
      <span>OR</span>
    </div>

    <div style="text-align: center;">
      <span style="color: var(--text-muted);">Don't have an account?</span>
      <a href="{{ route('register') }}" style="margin-left: 0.5rem; font-weight: 500;">Create account</a>
    </div>

  </form>

</div>

</x-guest-layout>