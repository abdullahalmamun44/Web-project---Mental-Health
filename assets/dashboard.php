<?php
if(!isset($_COOKIE['status']) || $_COOKIE['status'] !== 'true'){
    header('location: ../views/userlogin.php');
    exit();
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NIRVOY Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
    }

    .top-icons {
      display: flex;
      justify-content: space-around;
      padding: 1rem;
      background: white;
      flex-wrap: wrap;
      position: relative;
    }
    .icon-block {
      text-align: center;
      width: 80px;
      margin: 0.5rem;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .icon-block img {
      width: 50px;
      height: 50px;
      object-fit: contain;
      margin-bottom: 0.5rem;
    }
    .icon-block span {
      display: block;
      font-size: 0.9rem;
      color: #333;
    }
    .icon-block:hover {
      transform: scale(1.1);
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
    }

    /* Three-dot menu */
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
      padding: 5px;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background: white;
      min-width: 120px;
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
    .top-icons {
      display: flex;
      justify-content: space-around;
      padding: 1rem;
      background: white;
      flex-wrap: wrap;
      position: relative;
    }
    .icon-block {
      text-align: center;
      width: 80px;
      margin: 0.5rem;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .icon-block img {
      width: 50px;
      height: 50px;
      object-fit: contain;
      margin-bottom: 0.5rem;
    }
    .icon-block span {
      display: block;
      font-size: 0.9rem;
      color: #333;
    }
    .icon-block:hover {
      transform: scale(1.1);
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
    }

    /* Three-dot menu */
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
      padding: 5px;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background: white;
      min-width: 120px;
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

    .banner {
      margin: 1rem;
      background: #fff;
      border-radius: 10px;
      padding: 1rem;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .banner h2 {
      margin: 0.5rem 0;
      color: #222;
    }
    .banner img {
      width: 400px;
      max-width: 90%;
      height: auto;
      border-radius: 10px;
      margin: 1rem 0;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    .banner p {
      margin: 0.3rem 0;
      color: #555;
    }

    .emergency-button {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 1.5rem 0;
      flex-direction: column;
    }
    .emergency-button img {
      width: 100px;
      height: auto;
      margin-bottom: 0.5rem;
    }
    .emergency-button button {
      background: red;
      color: white;
      border: none;
      padding: 1rem 2rem;
      border-radius: 50px;
      font-size: 1rem;
      cursor: pointer;
      box-shadow: 0 0 10px rgba(255, 0, 0, 0.4);
      transition: background 0.3s ease, transform 0.2s ease;
    }
    .emergency-button button:hover {
      background: darkred;
      transform: scale(1.05);
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
  </style>
</head>
<body>
  <div class="top-icons">
    <div class="icon-block">
      <a href="phobia.php">
        <img src="../assets/image/phobia.jpeg" />
        <span>Phobia</span>
      </a>
    </div>

    <div class="icon-block">
      <a href="chatbot.php">
        <img src="../assets/image/chat bot.webp" />
        <span>Chatbot</span>
      </a>
    </div>

    <div class="icon-block">
      <a href="tools.php">
        <img src="../assets/image/tools.jpg" />
        <span>Entertainment</span>
      </a>
    </div>

    <div class="icon-block">
      <a href="library.php">
        <img src="../assets/image/library.png" />
        <span>Library</span>
      </a>
    </div>

    
    <div class="three-dot-menu">
      <button class="dot-btn">⋮</button>
      <div class="dropdown-content">
        <a href="../controllers/logout.php">Logout</a>
      </div>
    </div>
  </div>

  <div class="banner">
    <h2>Mental Health Awareness</h2>
    <img src="../assets/image/mental health dashboard.png" />
    <p>Sahyog The Helping Hand</p>
  </div>

    <div class="emergency-button">
      <button><a href="emergency.php">Emergency Button</a></button>


      <a href="../controllers/logout.php"> logout</a>
    </div>

  <div class="bottom-nav">
    <a href="dashboard.php" class="active">Dashboard</a>
    <a href="mood.php">Mood</a>
    <a href="consulting.php">Consulting</a>
    <a href="setting.php">Setting</a>
  </div>

  <script>
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
