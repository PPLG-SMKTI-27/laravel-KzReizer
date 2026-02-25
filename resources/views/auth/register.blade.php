{{-- ================= REGISTER ================= --}}
<x-guest-layout>
@vite('resources/css/auth.css')
<div class="form-wrap panel">

  <h1 class="title">Create Account</h1>
  
  @if($errors->any())
  <div class="error-message">
    @foreach($errors->all() as $error)
      <div>{{ $error }}</div>
    @endforeach
  </div>
  @endif

  <form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
      <label for="name">Full Name</label>
      <input 
        type="text" 
        name="name" 
        id="name"
        value="{{ old('name') }}"
        required 
        autofocus
        placeholder="John Doe"
      >
      @error('name')
        <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="email">Email Address</label>
      <input 
        type="email" 
        name="email" 
        id="email"
        value="{{ old('email') }}"
        required
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
        placeholder="Create a password"
      >
      @error('password')
        <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="password_confirmation">Confirm Password</label>
      <input 
        type="password" 
        name="password_confirmation" 
        id="password_confirmation"
        required
        placeholder="Confirm your password"
      >
    </div>

    <button type="submit" class="primary">
      <span>Create Account</span>
    </button>

    <div class="divider">
      <span>OR</span>
    </div>

    <div style="text-align: center;">
      <span style="color: var(--text-muted);">Already have an account?</span>
      <a href="{{ route('login') }}" style="margin-left: 0.5rem; font-weight: 500;">Sign in</a>
    </div>

  </form>

</div>

</x-guest-layout>