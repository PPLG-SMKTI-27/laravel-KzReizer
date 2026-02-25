@extends('layouts.portfolio')

@section('title', 'Portfolio | Michael Rival')

@section('content')

{{-- HERO --}}
<section class="hero container">
  <div class="hero-grid">
    <div>
      <h1>Michael Rival</h1>
      <p>Portfolio ini berisi kumpulan project web yang saya buat sebagai tugas sekolah dan latihan pengembangan web</p>
      
      <div class="hero-actions">
        <a href="#projects" class="btn">View Projects</a>
        <a href="#contact" class="btn outline">Contact</a>
      </div>
    </div>

    <div class="hero-photo">
      <img src="{{ asset('foto.jpg') }}" alt="Profile Michael Rival">
    </div>
  </div>
</section>

{{-- PROJECTS --}}
<section id="projects" class="section container">
  <h2 class="section-title">Projects</h2>

  <div class="projects-grid">
    @forelse ($projects as $project)
      <div class="project-card">
        <div class="project-thumb">
          @if(!empty($project->image))
            <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->title }}">
          @else
            {{ strtoupper(\Illuminate\Support\Str::limit($project->title, 8, '')) }}
          @endif
        </div>
        <div class="project-content">
          <h4>{{ $project->title }}</h4>
          <p>{{ $project->description }}</p>
          <a href="{{ route('project') }}" class="btn outline">Detail</a>
        </div>
      </div>
    @empty
      <p style="grid-column: 1/-1; text-align: center;">Project masih kosong.</p>
    @endforelse
  </div>
</section>

{{-- SKILLS --}}
<section id="skills" class="section container">
  <h2 class="section-title">Skills</h2>

  <div class="skills-grid">
    @forelse ($skills as $skill)
      <div class="skill-box">
        <h4>{{ $skill->name }}</h4>
        <p>{{ $skill->level }}</p>
      </div>
    @empty
      <p style="grid-column: 1/-1; text-align: center;">Skill masih kosong.</p>
    @endforelse
  </div>
</section>

{{-- CONTACT --}}
<section id="contact" class="section container">
  <div class="contact-box">
    <h2>Kontak Saya</h2>
    <br>
    <a href="https://wa.me/6282150942009" class="btn" target="_blank">WhatsApp</a>
    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=kzreizer@gmail.com" class="btn" target="_blank">Email</a>
    <a href="https://github.com/kzreizer" class="btn" target="_blank">GitHub</a>
  </div>
</section>

@endsection