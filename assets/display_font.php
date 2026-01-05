<?php
if(!isset($_COOKIE['status']) || $_COOKIE['status'] !== 'true'){
    header('location: ../views/userlogin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Nirvoy – Display & Font</title>
    <style>
      /* Basic reset and default font */
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
      }

      /* Page layout */
      body {
        background: #f7f8ff;
        color: #222;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
      }

      .top-bar {
        background: #4285f4;
        color: #fff;
        font-weight: bold;
        text-align: center;
        padding: 10px 0;
        font-size: 22px;
        position: relative; /* allow positioning of 3-dot menu */
      }

      /* Three-dot menu styles */
      .three-dot-menu {
        position: absolute;
        top: 8px;
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
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
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

      .page-wrapper {
        flex: 1;
        padding: 30px 40px 80px;
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      /* Cards */
      .card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 600px;
        padding: 20px 22px;
        margin-bottom: 16px;
      }

      .card-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
      }

      .row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 8px 0;
        font-size: 14px;
      }

      .row label {
        flex: 1;
      }

      select {
        margin-left: 10px;
      }

      .preview-box {
        margin-top: 12px;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        text-align: center;
        background: #f9fafc;
      }

      .small-note {
        margin-top: 6px;
        font-size: 12px;
        color: #777;
      }

      /* Bottom navigation bar */
      .bottom-nav {
        position: fixed;
        bottom: 0;
        width: 100%;
        background: #fff;
        display: flex;
        justify-content: space-around;
        padding: 1rem 0;
        border-top: 1px solid #ddd;
        box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
      }

      .bottom-nav a {
        font-size: 1rem;
        color: #333;
        text-decoration: none;
        text-align: center;
        transition: color 0.2s;
      }

      .bottom-nav a:hover {
        color: #007bff;
      }

      .bottom-nav a.active {
        color: #4a90e2;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <div class="top-bar">
      Display &amp; Font
      <div class="three-dot-menu">
        <button class="dot-btn">⋮</button>
        <div class="dropdown-content">
           <a href="../controllers/logout.php">Logout</a>
        </div>
      </div>
    </div>

    <div class="page-wrapper">
      <div class="card">
        <div class="card-title">Font style</div>

        <div class="row">
          <label for="fontFamily">Choose font</label>
          <select id="fontFamily">
            <option value="'Arial', sans-serif">Default (Arial)</option>
            <option value="'Segoe UI', sans-serif">Segoe UI</option>
            <option value="'Georgia', serif">Georgia</option>
          </select>
        </div>

        <div class="preview-box" id="previewText">
          CARE FOR YOUR MENTAL HEALTH
        </div>

        <div class="small-note">
          Pick the font that feels easiest for you to read.
        </div>
      </div>

      <div class="card">
        <div class="card-title">Theme</div>

        <div class="row">
          <label for="themeSelect">App theme</label>
          <select id="themeSelect">
            <option value="light">Light</option>
            <option value="dark">Dark (coming soon....)</option>
          </select>
        </div>

        <div class="small-note">
          Dark mode option is shown here for future updates; it does not change
          colors yet.
        </div>
      </div>
    </div>

    <div class="bottom-nav">
      <a href="dashboard.php">Dashboard</a>
      <a href="mood.php">Mood</a>
      <a href="consulting.php">Consulting</a>
      <a href="setting.php" class="active">Setting</a>
    </div>

    <script>
      const preview = document.getElementById("previewText");
      document.getElementById("fontFamily").addEventListener("change", (e) => {
        preview.style.fontFamily = e.target.value;
      });

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
