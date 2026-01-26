@extends('layouts.portfolio')

@section('title', 'Portfolio | Kz')

@section('content')

{{-- HERO --}}
<section class="hero container">
  <div class="hero-grid">
    <div>
    <h1>Michael Rival </h1>
    <p>Portfolio ini berisi kumpulan project web yang saya buat sebagai tugas sekolah dan latihan pengembangan web</p>
      </h1>



      <div class="hero-actions">
        <a href="#projects" class="btn">View Projects</a>
        <a href="#contact" class="btn outline">Contact</a>
      </div>

    </div>

    <div class="hero-photo">
      <img src="{{ asset('foto.jpg') }}" alt="Profile Kz">
    </div>
  </div>
</section>

{{-- PROJECTS --}}
<section id="projects" class="section container">
  <h2 class="section-title">Projects</h2>

  <div class="projects-grid">
    <div class="project-card">
      <div class="project-thumb">LUXAUTO</div>
      <div class="project-content">
        <h4>LuxAuto</h4>
        <p>Luxury car dealer website built with Laravel.</p>
        <a href="{{ route('login') }}" class="btn outline">Detail</a>
      </div>
    </div>

    <div class="project-card">
      <div class="project-thumb">PORTFOLIO</div>
      <div class="project-content">
        <h4>Personal Portfolio</h4>
        <p>Single page portfolio dengan fokus ke clarity.</p>
        <a href="#" class="btn outline">Detail</a>
      </div>
    </div>
  </div>
</section>

  <!-- SKILLS -->
  <section id="skills" class="section">
    <div class="container">
      <h2 class="section-title">Skills</h2>

      <div class="skills-grid">
        <div class="skill-box">
          <h4>Frontend</h4>
          <ul>
            <li>HTML</li>
            <li>CSS</li>
            <li></li>
          </ul>
        </div>

        <div class="skill-box">
          <h4>Backend</h4>
          <ul>
            <li>PHP</li>
          </ul>
        </div>


      </div>
    </div>
  </section>

{{-- CONTACT --}}
<section id="contact" class="section container">
  <div class="contact-box">
    <h2>kontak saya</h2>
      <br>
    <a href="https://wa.me/6282150942009" class="btn" target="_blank">WhatsApp</a>
    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=kzreizer@gmail.com" class="btn" target="_blank">Email</a>
    <a href="https://github.com/kzreizer" class="btn" target="_blank">GitHub</a>
  </div>
</section>

@endsection
