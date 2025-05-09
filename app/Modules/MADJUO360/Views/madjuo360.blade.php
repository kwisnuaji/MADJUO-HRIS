<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Madjuo360 - Manajemen Kinerja Futuristik</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/madjuo360.css') }}">
  
</head>
<body>

  <header>
    <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
      <div style="display: flex; align-items: center;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 70px; margin-right: 10px;">
        <h1>Madjuo360</h1>
      </div>
      <div class="menu-bar" style="margin-left: auto;" onclick="toggleMenu()">☰</div>
    </div>
    <nav>
      <a href="#">Beranda</a>
      <a href="#">Fitur</a>
      <a href="#">Madjuo Coins</a>
      <a href="{{ url('/login') }}">Login</a>
    </nav>
  </header>

  <section class="hero">
    <h2>Transformasi Feedback 360° yang Cerdas</h2>
    <p>Bangun budaya kerja positif dengan sistem manajemen kinerja berbasis AI, gamifikasi, dan feedback multidimensi.</p>
    <button class="cta-button" onclick="scrollToFeatures()">Mulai Sekarang</button>
  </section>

  <section class="features" id="features">
    <div class="feature-box">
      <h3>Feedback 360° AI</h3>
      <p>Gunakan analitik berbasis AI untuk meningkatkan kinerja secara objektif dan terukur.</p>
    </div>
    <div class="feature-box">
      <h3>Madjuo Coins</h3>
      <p>Sistem token inovatif untuk mengakses fitur dan booster secara fleksibel.</p>
    </div>
    <div class="feature-box">
      <h3>Skill Booster</h3>
      <p>Saran pengembangan otomatis untuk tiap individu berdasarkan hasil review.</p>
    </div>
    <div class="feature-box">
      <h3>Team Gems</h3>
      <p>Penguatan kinerja tim melalui insight dan pengembangan berbasis data.</p>
    </div>
  </section>

  <footer>
    &copy; 2025 Madjuo Digital Nusantara. All rights reserved.
  </footer>

  <script>
    function scrollToFeatures() {
      document.getElementById('features').scrollIntoView({ behavior: 'smooth' });
    }

    function toggleMenu() {
      const nav = document.querySelector('nav');
      nav.classList.toggle('active');
    }
  </script>
</body>
</html>
