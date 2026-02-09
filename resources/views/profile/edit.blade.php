{{-- ================= PROFILE ================= --}}
<x-app-layout>

<div class="profile-section">
  @include('profile.partials.update-profile-information-form')
</div>

<hr>

<div class="profile-section">
  @include('profile.partials.update-password-form')
</div>

<hr>

<div class="profile-section">
  @include('profile.partials.delete-user-form')
</div>

</x-app-layout>