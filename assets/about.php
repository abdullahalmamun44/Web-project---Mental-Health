<?php
if (!isset($_COOKIE['status']) || $_COOKIE['status'] !== 'true') {
  header('location: ../views/userlogin.php');
  exit();
}
?>

<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About NIRVOY</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
    }

    /* Dark Mode Overrides */
    body.dark-mode {
      background: #121212;
      color: #e0e0e0;
    }

    body.dark-mode .card,
    body.dark-mode .bottom-nav,
    body.dark-mode .dropdown-content {
      background: #1e1e1e;
      border-color: #333;
      color: #fff;
    }

    body.dark-mode .preview-box {
      background: #252525;
      border-color: #444;
      color: #fff;
    }

    body.dark-mode .bottom-nav a,
    body.dark-mode .dropdown-content a,
    body.dark-mode .row label {
      color: #bbb;
    }

    body.dark-mode .small-note {
      color: #888;
    }

    body.dark-mode .top-bar {
      background: #1a73e8;
      /* Slightly darker blue for dark mode header */
    }

    header {
      background: #4a90e2;
      color: white;
      padding: 1rem;
      text-align: center;
      font-size: 1.4rem;
      font-weight: bold;
      position: relative;
    }

    .three-dot-menu {
      position: absolute;
      top: 10px;
      right: 15px;
    }

    .dot-btn {
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      color: white;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background: white;
      min-width: 140px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
      border-radius: 5px;
      z-index: 1000;
    }

    .dropdown-content a {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: #333;
    }

    .dropdown-content a:hover {
      background: #f0f0f0;
    }

    .show {
      display: block;
    }

    .about-section {
      margin: 1rem;
      padding: 1.5rem;
      background: white;
      border-radius: 12px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
    }

    .about-section h2 {
      color: #333;
      margin-bottom: 0.8rem;
      text-align: center;
    }

    .about-section p {
      font-size: 1rem;
      color: #555;
      line-height: 1.6;
      margin-bottom: 1rem;
      text-align: justify;
    }

    .features {
      margin-top: 1rem;
    }

    .features ul {
      list-style: none;
      padding: 0;
    }

    .features li {
      background: #e6f0ff;
      margin: 0.5rem 0;
      padding: 0.7rem;
      border-radius: 8px;
      font-size: 0.95rem;
      color: #333;
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      width: 100%;
      background: white;
      display: flex;
      justify-content: space-around;
      padding: 1rem 0;
      box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
      border-top: 1px solid #ddd;
    }

    .bottom-nav a {
      text-align: center;
      font-size: 1rem;
      color: #333;
      text-decoration: none;
      transition: color 0.2s ease;
    }

    .bottom-nav a:hover {
      color: #007bff;
    }

    .bottom-nav a.active {
      color: #4a90e2;
      font-weight: bold;
    }

    @media (max-width: 600px) {
      .about-section {
        padding: 1rem;
      }

      .about-section p {
        font-size: 0.9rem;
      }

      .bottom-nav a {
        font-size: 0.9rem;
      }
    }
  </style>
</head>

<body>
  <header>
    About NIRVOY

    <div class="three-dot-menu">
      <button class="dot-btn">⋮</button>
      <div class="dropdown-content">
        <a href="profile.php">👤Profile</a>
        
        <a href="appointment.php">📅Book your Appointment</a>
        <a href="../controllers/logout.php">🚪Logout</a>
      </div>
    </div>
  </header>

  <div class="about-section">
    <h2>Our Mission</h2>
    <p>NIRVOY is a digital mental health support system designed for individuals in Bangladesh who suffer from panic attacks, phobias, depression, anxiety, and other emotional challenges. Our mission is to provide instant help, cultural sensitivity, privacy, and accessibility to everyone in need.</p>

    <h2>Our Vision</h2>
    <p>We envision a society where mental health support is available to all, free from stigma and barriers. NIRVOY combines emergency tools with long-term counseling and therapy to empower individuals in their wellness journey.</p>

    <h2>Key Features</h2>
    <div class="features">
      <ul>
        <li> Emergency tools for panic attacks and phobias</li>
        <li> Access to licensed psychologists and counselors</li>
        <li> Progress tracking for emotional well-being</li>
        <li> Cultural sensitivity tailored for Bangladesh</li>
        <li> Strong privacy and confidentiality</li>
      </ul>
    </div>
  </div>

  <div class="bottom-nav">
    <a href="../views/dashboard.php"> Dashboard</a>
    <a href="mood.php"> Mood</a>
    <a href="consulting.php"> Consulting</a>
    <a href="library.php"> Library</a>
    <a href="setting.php"> Setting</a>
  </div>

  <script>
    function syncSettings() {
      const savedFont = localStorage.getItem("nirvoyFont");
      if (savedFont) {
        document.body.style.fontFamily = savedFont;
      }

      const savedTheme = localStorage.getItem("nirvoyTheme");
      if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
      } else {
        document.body.classList.remove('dark-mode');
      }
    }
    syncSettings();
    document.querySelector('.dot-btn').addEventListener('click', function() {
      document.querySelector('.dropdown-content').classList.toggle('show');
    });

    window.addEventListener('click', function(e) {
      if (!e.target.matches('.dot-btn')) {
        const dropdown = document.querySelector('.dropdown-content');
        if (dropdown.classList.contains('show')) {
          dropdown.classList.remove('show');
        }
      }
    });
  </script>
</body>

</html>