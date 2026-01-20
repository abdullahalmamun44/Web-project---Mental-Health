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
    /* We keep your base styles, but the loader will override the font-family */
    body {
      font-family: "Segoe UI", sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f8fb;
      color: #333;
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

    .language-select {
      margin-top: 0.5rem;
    }

    button,
    select {
      margin: 0.5rem;
      padding: 0.5rem 1rem;
      font-size: 1rem;
    }

    .intro {
      text-align: center;
      margin: 2rem 0;
    }

    .menu {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #e0e0e0;
      display: flex;
      justify-content: space-around;
      padding: 0.5rem 0;
    }

    .nav-btn {
      background: none;
      border: none;
      font-size: 1.2rem;
    }

    .page {
      display: none;
      padding: 1rem;
    }

    .page.active {
      display: block;
    }
  </style>
</head>

<body>
  <script>
    (function () {
      const savedFont = localStorage.getItem("nirvoyFont");
      if (savedFont) {
        document.documentElement.style.setProperty('font-family', savedFont, 'important');
        document.write(`<style>body, button, select, input, textarea { font-family: ${savedFont} !important; }</style>`);
      }
    }
    )();
  </script>
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
        <a href="profile.php">Profile</a>
        <a href="appointment.php">Book your Appointment</a>
        <a href="../controllers/logout.php">Logout</a>
      </div>
    </div>
  </header>

  <main>
    <section id="home" class="page active">
      <div class="intro">
        <h2>CARE FOR YOUR MENTAL HEALTH</h2>
      </div>
      <nav class="menu">
        <button><a href="display_font.php" style="text-decoration:none; color:inherit;">Display & Font</a></button>
        <button><a href="about.php" style="text-decoration:none; color:inherit;">About</a></button>
        <button><a href="software_update.php" style="text-decoration:none; color:inherit;">Software update</a></button>
      </nav>
    </section>

    <section id="setting" class="page">
      <h2>Settings</h2>
      <p>Here you can customize your app preferences:</p>
      <ul>
        <li>Change Language</li>
        <li>Toggle Voice Assistance</li>
        <li>Update Software</li>
        <li>About Nirvoy</li>
      </ul>
    </section>
  </main>

  <script>
    // Voice Toggle Logic
    document.getElementById("voiceToggle").addEventListener("click", function () {
      const current = this.textContent.includes("Off");
      this.textContent = `Voice: ${current ? "On" : "Off"}`;
    });

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
  </script>
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

  <div class="bottom-nav">
    <a href="../views/dashboard.php"> Dashboard</a>
    <a href="mood.php"> Mood</a>
    <a href="consulting.php"> Consulting</a>
    <a href="setting.php" class="active"> Setting</a>
  </div>
</body>

</html>