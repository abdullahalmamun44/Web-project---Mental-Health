<?php
if (!isset($_COOKIE['status']) || $_COOKIE['status'] !== 'true') {
  header('location: ../views/userlogin.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nirvoy - Mental Health App</title>
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f8fb;
      color: #333;
      padding-bottom: 70px;
    }

    body.dark-mode {
      background: #121212;
      color: #e0e0e0;
    }

    body.dark-mode .dropdown-content {
      background: #1e1e1e;
      border-color: #333;
      color: #fff;
    }

    body.dark-mode .bottom-nav {
      background-color: #222;
    }

    header {
      background-color: #4a90e2;
      color: white;
      padding: 1rem;
      text-align: center;
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
      min-width: 160px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
      border-radius: 5px;
      z-index: 1000;
    }

    .dropdown-content a {
      display: block;
      padding: 12px;
      text-decoration: none;
      color: #333;
      text-align: left;
    }

    .dropdown-content a:hover {
      background: #f0f0f0;
    }

    .show {
      display: block !important;
    }

    .menu {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-top: 2rem;
    }

    .menu button {
      padding: 10px 15px;
      cursor: pointer;
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #e0e0e0;
      display: flex;
      justify-content: space-around;
      padding: 1rem 0;
      border-top: 1px solid #ccc;
    }

    .bottom-nav a {
      text-decoration: none;
      color: inherit;
      font-weight: bold;
    }

    .bottom-nav a.active {
      color: #4a90e2;
    }
  </style>

  <script>
    (function () {
      const savedFont = localStorage.getItem("nirvoyFont");
      const savedTheme = localStorage.getItem("nirvoyTheme");
      if (savedFont) {
        document.documentElement.style.setProperty('font-family', savedFont);
        document.write(`<style>body, button, select, input, textarea { font-family: ${savedFont} !important; }</style>`);
      }
      if (savedTheme === 'dark') {
        document.documentElement.classList.add('dark-mode');
      }
    })();
  </script>
</head>

<body>
  <header>
    <h1>Nirvoy</h1>
    <div class="language-select">
      <label for="language">Select Language:</label>
      <select id="language">
        <option value="en">English</option>
        <option value="bn">Bangla</option>
      </select>
    </div>
    <button id="voiceToggle">Voice: Off</button>

    <div class="three-dot-menu">
      <button class="dot-btn">⋮</button>
      <div class="dropdown-content">
        <a href="../views/profile.php">Profile</a>
        <a href="../views/appointment.php">Book your Appointment</a>
        <a href="../controllers/logout.php">Logout</a>
      </div>
    </div>
  </header>

  <main>
    <section id="home" class="page">
      <div class="intro">
        <h2 style="text-align: center;">CARE FOR YOUR MENTAL HEALTH</h2>
      </div>
      <nav class="menu">
        <button onclick="location.href='display_font.php'">Display & Font</button>
        <button onclick="location.href='about.php'">About</button>
        <button onclick="location.href='software_update.php'">Software Update</button>
      </nav>
    </section>
  </main>

  <div class="bottom-nav">
    <a href="../views/dashboard.php">Dashboard</a>
    <a href="mood.php">Mood</a>
    <a href="consulting.php">Consulting</a>
    <a href="setting.php" class="active">Setting</a>
  </div>

  <script>
    document.getElementById("voiceToggle").addEventListener("click", function() {
      const current = this.textContent.includes("Off");
      this.textContent = `Voice: ${current ? "On" : "Off"}`;
    });
    const dotBtn = document.querySelector('.dot-btn');
    const dropdown = document.querySelector('.dropdown-content');

    // Dropdown Logic
    document.querySelector('.dot-btn').addEventListener('click', function () {
      document.querySelector('.dropdown-content').classList.toggle('show');
    });

    window.addEventListener('click', function (e) {
      if (!e.target.matches('.dot-btn')) {
        const dropdown = document.querySelector('.dropdown-content');
        if (dropdown && dropdown.classList.contains('show')) {
          dropdown.classList.remove('show');
        }
      }
    });

    // Language Alert
    document.getElementById("language").addEventListener("change", function () {
      alert(`Language changed to ${this.options[this.selectedIndex].text}`);
    });

    function syncSettings() {
      const savedTheme = localStorage.getItem("nirvoyTheme");
      if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
      }
    }
    syncSettings();
  </script>
</body>

</html>