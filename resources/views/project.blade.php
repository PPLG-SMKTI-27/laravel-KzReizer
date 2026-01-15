<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>LuxAuto Dealer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Segoe UI", sans-serif;
}

body {
  background: #0f0f0f;
  color: #fff;
}

/* NAVBAR */
.navbar {
  position: sticky;
  top: 0;
  background: #111;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 15px 40px;
  border-bottom: 1px solid #222;
}

.logo {
  font-size: 22px;
  font-weight: bold;
}

.logo span {
  color: gold;
}

.nav-menu a {
  margin: 0 12px;
  text-decoration: none;
  color: #ccc;
  font-size: 14px;
}

.nav-menu a:hover {
  color: gold;
}

.user-menu button {
  margin-left: 8px;
}

/* BUTTON */
.btn-primary {
  background: gold;
  border: none;
  padding: 8px 16px;
  cursor: pointer;
  font-weight: bold;
}

.btn-outline {
  background: transparent;
  border: 1px solid gold;
  color: gold;
  padding: 8px 16px;
  cursor: pointer;
}

/* HERO */
.hero {
  height: 60vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 0 40px;
  background: linear-gradient(to right, #000, #222);
}

.hero h1 {
  font-size: 42px;
}

.hero p {
  margin-top: 10px;
  color: #aaa;
}

/* PROFILE */
.profile {
  padding: 60px 40px;
}

.profile h2 {
  margin-bottom: 15px;
  color: gold;
}

/* MODAL */
.modal {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.7);
  justify-content: center;
  align-items: center;
}

.modal-box {
  background: #111;
  padding: 25px;
  width: 300px;
  border-radius: 8px;
}

.modal-box input {
  width: 100%;
  margin: 10px 0;
  padding: 8px;
  background: #222;
  border: none;
  color: white;
}

/* FOOTER */
footer {
  text-align: center;
  padding: 20px;
  background: #111;
  color: #666;
}
 /*tombol kembali ke portofolio*/
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

.warning-bar {
    width: auto;
    overflow: hidden;
    background: #000;
    border-bottom: 1px solid #330000;
}

.warn {
    display: inline-block;
    white-space: nowrap;
    color: red;
    font-size: 24px;
    font-weight: bold;
    padding: 10px 0;

    animation: warning-move 15s linear infinite;
}

@keyframes warning-move {
    0% {
        transform: translateX(100vw);
    }
    100% {
        transform: translateX(-100%);
    }
}

  </style>
  <div class="warning-bar">
    <h1 class="warn">!! Warning masi dalam tahap pengembangan !!</h1>
  </div>
  
</head>
<body>

<header class="navbar">
  <div class="logo">Lux<span>Auto</span></div>

  <nav class="nav-menu">
    <a href="#">Home</a>
    <a href="#">Cars</a>
    <a href="#">Brands</a>
    <a href="#">Services</a>
    <a href="#">Promo</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
  </nav>

  <div class="user-menu" id="userMenu">
    <button class="btn-outline" onclick="showLogin()">Login</button>
    <button class="btn-primary" onclick="showRegister()">Register</button>
  </div>
</header>

<!-- HERO -->
<section class="hero">
  <h1>Luxury Cars, Premium Experience</h1>
  <p>Dealer mobil mewah terpercaya dengan pelayanan kelas atas</p>
</section>

<!-- PROFILE DEALER -->
<section class="profile">
  <h2>Profil Dealer</h2>
  <p>
    LuxAuto adalah dealer mobil mewah yang menyediakan berbagai brand premium
    dengan kualitas terbaik dan pelayanan profesional.
  </p>
</section>

<!-- AUTH MODAL -->
<div class="modal" id="authModal">
  <div class="modal-box">
    <h3 id="modalTitle">Login</h3>
    <input type="text" placeholder="Username" id="username">
    <input type="password" placeholder="Password">
    <button class="btn-primary" onclick="login()">Submit</button>
    <button class="btn-outline" onclick="closeModal()">Cancel</button>
  </div>
</div>

<a href="{{ route('index') }}" class="btn">Portofolio saya</a>

<footer>
  <p>© 2026 LuxAuto Dealer. All rights reserved.</p>
</footer>


</body>
</html>