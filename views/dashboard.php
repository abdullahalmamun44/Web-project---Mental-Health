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
  <title>NIRVOY Dashboard</title>
  <style>
    /* 1. Global Styles & Theme Variables */
    :root {
      --bg-color: #f0f4f8;
      --card-bg: #ffffff;
      --text-color: #333;
      --primary-blue: #4285f4;
    }

    /* Dark Mode Support (Automatically inherits from Settings) */
    body.dark-mode {
      --bg-color: #121212;
      --card-bg: #1e1e1e;
      --text-color: #e0e0e0;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: var(--bg-color);
      color: var(--text-color);
      padding-bottom: 80px;
      /* Space for bottom nav */
    }

    /* 2. Header Icons Section */
    .top-icons {
      display: flex;
      justify-content: space-around;
      padding: 1rem;
      background: var(--card-bg);
      flex-wrap: wrap;
      position: relative;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .icon-block {
      text-align: center;
      width: 85px;
      margin: 0.5rem;
      cursor: pointer;
    }

    .icon-block a {
      text-decoration: none;
      color: inherit;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .icon-block img {
      width: 55px;
      height: 55px;
      object-fit: cover;
      border-radius: 12px;
      margin-bottom: 0.5rem;
      transition: transform 0.2s ease;
    }

    .icon-block:hover img {
      transform: scale(1.1);
    }

    .icon-block span {
      font-size: 0.85rem;
      font-weight: 500;
    }

    /* 3. Three-dot Menu */
    .three-dot-menu {
      position: absolute;
      top: 10px;
      right: 10px;
    }

    .dot-btn {
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      color: var(--text-color);
    }

    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background: var(--card-bg);
      min-width: 160px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      border-radius: 8px;
      z-index: 1000;
      overflow: hidden;
    }

    .dropdown-content a {
      display: block;
      padding: 12px;
      text-decoration: none;
      color: var(--text-color);
      font-size: 0.9rem;
    }

    .dropdown-content a:hover {
      background: rgba(0, 0, 0, 0.05);
    }

    .show {
      display: block;
    }

    /* 4. Banner Section */
    .banner {
      margin: 1rem;
      background: var(--card-bg);
      border-radius: 15px;
      padding: 1.5rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      text-align: center;
    }
    .banner img {
      width: 100%;
      max-width: 500px;
      border-radius: 10px;
      margin: 1rem 0;
    }

    /* 5. Emergency Button */
    .emergency-section {
      text-align: center;
      margin: 2rem 0;
    }

    .emergency-btn {
      background: #ff3b30;
      color: white;
      border: none;
      padding: 15px 40px;
      border-radius: 50px;
      font-size: 1.1rem;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
      box-shadow: 0 4px 15px rgba(255, 59, 48, 0.3);
      transition: 0.2s;
    }

    .emergency-btn:hover {
      background: #d32f2f;
      transform: translateY(-2px);
    }

    /* 6. Bottom Navigation */
    .bottom-nav {
      position: fixed;
      bottom: 0;
      width: 100%;
      background: var(--card-bg);
      display: flex;
      justify-content: space-around;
      padding: 12px 0;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
      border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    .bottom-nav a {
      color: var(--text-color);
      text-decoration: none;
      font-size: 0.9rem;
      opacity: 0.7;
    }

    .bottom-nav a.active {
      color: var(--primary-blue);
      font-weight: bold;
      opacity: 1;
    }
  </style>
</head>

<body>
  <div class="top-icons">
    <div class="icon-block">
      <a href="../assets/phobia.php">
        <img src="../assets/image/phobia.jpeg" alt="Phobia">
        <span>Phobia</span>
      </a>
    </div>

    <div class="icon-block">
      <a href="../assets/chatbot.php">
        <img src="../assets/image/chat bot.webp" alt="Chatbot">
        <span>Chatbot</span>
      </a>
    </div>

    <div class="icon-block">
      <a href="../assets/Entertainment.php">
        <img src="../assets/image/tools.jpg" alt="Entertainment">
        <span>Entertainment</span>
      </a>
    </div>

    <div class="icon-block">
      <a href="../assets/library.php">
        <img src="../assets/image/library.png" alt="Library">
        <span>Library</span>
      </a>
    </div>

    <div class="three-dot-menu">
      <button class="dot-btn">⋮</button>
      <div class="dropdown-content">
        <a href="profile.php">👤 Profile</a>
        <a href="appointment.php">📅 Appointment</a>
        <a href="../assets/setting.php">⚙️ Setting</a>
        <a href="../controllers/logout.php" style="color: red;">🚪 Logout</a>
      </div>
    </div>
  </div>

  <div class="banner">
    <h2>Mental Health Awareness</h2>
    <img src="../assets/image/mental health dashboard.png" alt="Awareness">
    <p><strong>Sahyog</strong> - The Helping Hand</p>
  </div>

  <div class="emergency-section">
    <a href="../assets/emergency.php" class="emergency-btn">Emergency Help</a>
  </div>

  <nav class="bottom-nav">
    <a href="dashboard.php" class="active">Dashboard</a>
    <a href="../assets/mood.php">Mood</a>
    <a href="../assets/consulting.php">Consulting</a>
    <a href="../assets/setting.php">Setting</a>
  </nav>

  <script>
    // --- Dark Mode Loader ---
    (function() {
      const savedTheme = localStorage.getItem("nirvoyTheme");
      const savedFont = localStorage.getItem("nirvoyFont");
      if (savedTheme === 'dark') document.body.classList.add('dark-mode');
      if (savedFont) document.body.style.fontFamily = savedFont;
    })();

    // --- Dropdown Logic ---
    document.querySelector('.dot-btn').addEventListener('click', function(e) {
      e.stopPropagation();
      document.querySelector('.dropdown-content').classList.toggle('show');
    });

    window.addEventListener('click', function() {
      const dropdown = document.querySelector('.dropdown-content');
      if (dropdown.classList.contains('show')) {
        dropdown.classList.remove('show');
      }
    });
  </script>
</body>

</html>