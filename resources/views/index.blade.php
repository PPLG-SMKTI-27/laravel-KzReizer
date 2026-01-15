<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio | Kz</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #0f1220;
      color: #eaeaf0;
    }
    

    .profile {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 3px solid #2a2e52;
      margin: 0 auto 15px;
      display: block;
      
    }
    .container {
      max-width: 800px;
      margin: auto;
      padding: 40px 20px;
      
      
    }
    h1, h2 {
      margin-bottom: 10px;
    }
    p {
      color: #b5b8c9;
      line-height: 1.6;
    }
    section {
      margin-top: 30px;
    }
    ul {
      padding-left: 18px;
    }
    li {
      margin-bottom: 6px;
      color: #b5b8c9;
    }

    .btn {
  display: inline-block;
  padding: 10px 18px;
  border-radius: 8px;
  background: #6c7cff;
  color: #fff;
  font-size: 14px;
  font-weight: 600;
  text-decoration: none;
  border: none;
  cursor: pointer;
  transition: 0.2s ease;
}

.btn:hover {
  background: #5a69e6;
  transform: translateY(-2px);
}

.btn:active {
  transform: translateY(0);
}

    footer {
      margin-top: 50px;
      font-size: 14px;
      color: #8a8fa8;
      text-align: center;
    }
  </style>
</head>
<body>
  <img src="foto.jpg" class="profile">
  <div class="container">
    <header>
      
      <h1>Michael rival</h1>
      <p>Pelajar yang tertarik sama teknologi, dan game.</p>
    </header>

    <section>
      <h2>Tentang Saya</h2>
      <p>saya manusia.</p>
    </section>

    <section>
      <h2>Skill</h2>
      <ul>
        <li>HTML & CSS dasar</li>
        <li>Basic php</li>
      </ul>
    </section>

    <section>
      <h2>Kontak</h2>
      <p>Email: kzreizer@email.com</p>
      <p>Telp: 082150942009</p>
    </section>

    
    <a href="{{ route('project') }}" class="btn">Project Saya</a>
    

    <footer>
      © 2026 
    </footer>
  </div>
</body>
</html>