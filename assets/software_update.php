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
  <title>Nirvoy – Software Update</title>
  <style>
    :root {
      --bg-color: #f7f8ff;
      --text-color: #222;
      --card-bg: #ffffff;
      --card-shadow: rgba(0, 0, 0, 0.08);
      --nav-bg: #ffffff;
      --border-color: #dddddd;
      --secondary-btn: #eeeeee;
    }

    body.dark-mode {
      --bg-color: #121212;
      --text-color: #e0e0e0;
      --card-bg: #1e1e1e;
      --card-shadow: rgba(0, 0, 0, 0.3);
      --nav-bg: #1e1e1e;
      --border-color: #333333;
      --secondary-btn: #333333;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      transition: background 0.3s, color 0.3s;
    }

    body {
      background: var(--bg-color);
      color: var(--text-color);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .top-bar {
      background: #4285f4;
      color: #ffffff;
      font-weight: bold;
      text-align: center;
      padding: 15px 0;
      font-size: 20px;
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

    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background: var(--card-bg);
      min-width: 140px;
      box-shadow: 0 4px 12px var(--card-shadow);
      border-radius: 8px;
      z-index: 1000;
      border: 1px solid var(--border-color);
    }

    .dropdown-content a {
      display: block;
      padding: 12px;
      text-decoration: none;
      color: var(--text-color);
    }

    .show {
      display: block;
    }

    .page-wrapper {
      flex: 1;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .card {
      background: var(--card-bg);
      border-radius: 12px;
      box-shadow: 0 2px 10px var(--card-shadow);
      width: 100%;
      max-width: 500px;
      padding: 25px;
      margin-top: 20px;
      border: 1px solid var(--border-color);
    }

    .card-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 8px;
      text-align: center;
    }

    .card-subtitle {
      font-size: 14px;
      color: #777;
      text-align: center;
      margin-bottom: 20px;
    }

    .info-row {
      font-size: 14px;
      margin-bottom: 8px;
    }

    .info-label {
      font-weight: bold;
    }

    .update-tag {
      display: inline-block;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 12px;
      background: #fff8e1;
      color: #ff8f00;
      margin: 10px 0;
    }

    .progress-container {
      margin: 20px 0;
    }

    .progress-bar {
      width: 100%;
      height: 10px;
      border-radius: 10px;
      background: #e0e0e0;
      overflow: hidden;
    }

    .progress-fill {
      width: 45%;
      height: 100%;
      background: #4285f4;
    }

    .progress-text {
      font-size: 12px;
      color: #666;
      text-align: right;
      margin-top: 5px;
    }

    .button-row {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin-top: 20px;
    }

    .btn {
      border: none;
      border-radius: 50px;
      padding: 10px 20px;
      font-size: 14px;
      font-weight: bold;
      cursor: pointer;
    }

    .btn-primary {
      background: #4285f4;
      color: white;
    }

    .btn-secondary {
      background: var(--secondary-btn);
      color: var(--text-color);
    }

    .note {
      font-size: 12px;
      color: #888;
      margin-top: 20px;
      text-align: center;
      line-height: 1.4;
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      width: 100%;
      background: var(--nav-bg);
      display: flex;
      justify-content: space-around;
      padding: 15px 0;
      border-top: 1px solid var(--border-color);
    }

    .bottom-nav a {
      color: var(--text-color);
      text-decoration: none;
      font-size: 14px;
    }

    .bottom-nav a.active {
      color: #4285f4;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="top-bar">
    Software Update
    <div class="three-dot-menu">
      <button class="dot-btn">⋮</button>
      <div class="dropdown-content">
        <a href="profile.php">👤 Profile</a>
        <a href="../controllers/logout.php">🚪 Logout</a>
      </div>
    </div>
  </div>

  <div class="page-wrapper">
    <div class="card">
      <div class="card-title">NIRVOY App</div>
      <div class="card-subtitle">Keep your mental health tools secure and up to date.</div>

      <div class="info-row"><span class="info-label">Current version:</span> 1.0.0</div>
      <div class="info-row"><span class="info-label">Latest version:</span> 1.1.0</div>
      <div class="info-row"><span class="info-label">Update size:</span> 25 MB</div>

      <div class="update-tag">Update available</div>

      <div class="progress-container">
        <div class="progress-bar">
          <div class="progress-fill"></div>
        </div>
        <div class="progress-text">Downloading… 45%</div>
      </div>

      <div class="button-row">
        <button class="btn btn-primary" id="downloadBtn">Download & Install</button>
        <button class="btn btn-secondary" id="laterBtn">Later</button>
      </div>

      <div class="note">
        Tip: Connect to Wi‑Fi and keep your device charged while updating.
      </div>
    </div>
  </div>

  <nav class="bottom-nav">
    <a href="../views/dashboard.php">Dashboard</a>
    <a href="mood.php">Mood</a>
    <a href="consulting.php">Consulting</a>
    <a href="setting.php" class="active">Setting</a>
  </nav>

  <script>
    (function syncSettings() {
      const savedFont = localStorage.getItem("nirvoyFont");
      const savedTheme = localStorage.getItem("nirvoyTheme");
      if (savedFont) document.body.style.fontFamily = savedFont;
      if (savedTheme === 'dark') document.body.classList.add('dark-mode');
    })();

    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById("laterBtn").addEventListener("click", function() {
        window.location.href = "setting.php";
      });

      document.getElementById("downloadBtn").addEventListener("click", function() {
        alert("Download started...");
      });

      document.querySelector('.dot-btn').addEventListener('click', function(e) {
        e.stopPropagation();
        document.querySelector('.dropdown-content').classList.toggle('show');
      });

      window.addEventListener('click', function() {
        const dropdown = document.querySelector('.dropdown-content');
        if (dropdown && dropdown.classList.contains('show')) {
          dropdown.classList.remove('show');
        }
      });
    });
  </script>
</body>

</html>