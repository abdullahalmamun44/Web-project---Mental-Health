<?php
// Secure session check
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
  <title>Nirvoy – Display & Font</title>
  <style>
    /* 1. Global Reset & Base Styles */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: #f7f8ff;
      color: #222;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      font-family: Arial, sans-serif;
      transition: background 0.3s, color 0.3s;
    }

    /* 2. Dark Mode Overrides */
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

    /* 3. Top Navigation Bar */
    .top-bar {
      background: #4285f4;
      color: #fff;
      font-weight: bold;
      text-align: center;
      padding: 15px 0;
      font-size: 22px;
      position: relative;
    }

    .three-dot-menu {
      position: absolute;
      top: 12px;
      right: 15px;
    }

    .dot-btn {
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      color: white;
    }

    /* 4. Dropdown Menu */
    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background: white;
      min-width: 180px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      border-radius: 8px;
      z-index: 1000;
      overflow: hidden;
    }

    .dropdown-content a {
      display: block;
      padding: 12px 16px;
      text-decoration: none;
      color: #333;
      text-align: left;
      font-size: 14px;
    }

    .dropdown-content a:hover {
      background: #f0f0f0;
    }

    .show {
      display: block !important;
    }

    /* 5. Main Content Layout */
    .page-wrapper {
      flex: 1;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
      width: 100%;
      max-width: 500px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .card-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 15px;
    }

    select {
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
      outline: none;
    }

    .preview-box {
      margin: 15px 0;
      padding: 20px;
      border: 1px dashed #ddd;
      border-radius: 8px;
      font-size: 18px;
      text-align: center;
      background: #f9fafc;
    }

    .small-note {
      font-size: 12px;
      color: #777;
    }

    /* 6. Bottom Navigation */
    .bottom-nav {
      position: fixed;
      bottom: 0;
      width: 100%;
      background: #fff;
      display: flex;
      justify-content: space-around;
      padding: 15px 0;
      border-top: 1px solid #ddd;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
    }

    .bottom-nav a {
      font-size: 0.9rem;
      color: #555;
      text-decoration: none;
    }

    .bottom-nav a.active {
      color: #4285f4;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="top-bar">
    Display &amp; Font
    <div class="three-dot-menu">
      <button class="dot-btn" id="menuBtn">⋮</button>
      <div class="dropdown-content" id="dropdownMenu">
        <a href="profile.php">👤 Profile</a>
        <a href="appointment.php">📅 Book Appointment</a>
        <a href="../controllers/logout.php">🚪 Logout</a>
      </div>
    </div>
  </div>

  <div class="page-wrapper">
    <div class="card">
      <div class="card-title">Font Style</div>
      <div class="row">
        <label for="fontFamily">Choose font</label>
        <select id="fontFamily">
          <option value="Arial, sans-serif">Default (Arial)</option>
          <option value="'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Segoe UI</option>
          <option value="'Georgia', serif">Georgia</option>
          <option value="'Courier New', monospace">Monospace</option>
        </select>
      </div>
      <div class="preview-box" id="previewText">
        CARE FOR YOUR MENTAL HEALTH
      </div>
      <div class="small-note">Pick the font that feels easiest for you to read.</div>
    </div>

    <div class="card">
      <div class="card-title">Theme</div>
      <div class="row">
        <label for="themeSelect">App theme</label>
        <select id="themeSelect">
          <option value="light">Light Mode</option>
          <option value="dark">Dark Mode</option>
        </select>
      </div>
      <div class="small-note">Switch to Dark Mode to reduce eye strain at night.</div>
    </div>
  </div>

  <nav class="bottom-nav">
    <a href="../views/dashboard.php">Dashboard</a>
    <a href="mood.php">Mood</a>
    <a href="consulting.php">Consulting</a>
    <a href="setting.php" class="active">Setting</a>
  </nav>

  <script>
    const fontSelector = document.getElementById("fontFamily");
    const themeSelector = document.getElementById("themeSelect");
    const previewBox = document.getElementById("previewText");
    const menuBtn = document.getElementById("menuBtn");
    const dropdownMenu = document.getElementById("dropdownMenu");

    // --- FONT LOGIC ---
    function updateAppFont(fontName) {
      document.body.style.fontFamily = fontName;
      if (previewBox) previewBox.style.fontFamily = fontName;
    }

    const savedFont = localStorage.getItem("nirvoyFont");
    if (savedFont) {
      updateAppFont(savedFont);
      fontSelector.value = savedFont;
    }

    fontSelector.addEventListener("change", (e) => {
      updateAppFont(e.target.value);
      localStorage.setItem("nirvoyFont", e.target.value);
    });

    // --- THEME LOGIC ---
    function applyTheme(theme) {
      if (theme === 'dark') {
        document.body.classList.add('dark-mode');
      } else {
        document.body.classList.remove('dark-mode');
      }
    }

    const savedTheme = localStorage.getItem("nirvoyTheme");
    if (savedTheme) {
      applyTheme(savedTheme);
      themeSelector.value = savedTheme;
    }

    themeSelector.addEventListener("change", (e) => {
      const selectedTheme = e.target.value;
      applyTheme(selectedTheme);
      localStorage.setItem("nirvoyTheme", selectedTheme);
    });

    // --- DROPDOWN LOGIC ---
    menuBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      dropdownMenu.classList.toggle('show');
    });

    window.addEventListener('click', () => {
      if (dropdownMenu.classList.contains('show')) {
        dropdownMenu.classList.remove('show');
      }
    });
  </script>
</body>

</html>