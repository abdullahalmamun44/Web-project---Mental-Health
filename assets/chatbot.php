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
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NIRVOY Chatbot Benefits</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
    }

    header {
      background: #4a90e2;
      color: white;
      padding: 1rem;
      text-align: center;
      font-size: 1.3rem;
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

    .section {
      margin: 1rem;
      padding: 1rem;
      background: white;
      border-radius: 12px;
      box-shadow: 0 0 12px rgba(0,0,0,0.1);
      text-align: center;
    }

    .section h2 {
      margin-bottom: 0.5rem;
      color: #333;
    }

    .section img {
      width: 100%;
      max-width: 400px;
      margin: 0.5rem auto;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }

    .chatbox {
      margin-top: 1rem;
      background: #f9f9f9;
      border-radius: 10px;
      padding: 1rem;
      text-align: left;
      font-size: 0.95rem;
      color: #444;
    }

    .chatbox .user {
      margin-bottom: 0.5rem;
      font-weight: bold;
      color: #d9534f;
    }

    .chatbox .bot {
      font-weight: bold;
      color: #4a90e2;
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      width: 100%;
      background: white;
      display: flex;
      justify-content: space-around;
      padding: 1rem 0;
      box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
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
      .section img {
        width: 90%;
      }

      
      .bottom-nav a {
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>
  <header>
    Benefits of Chatbots for Mental Health
   
    <div class="three-dot-menu">
      <button class="dot-btn">⋮</button>
      <div class="dropdown-content">
        <a href="profile.php">Profile</a>
       <a href="../controllers/logout.php">Logout</a>
      </div>
    </div>
  </header>

  <div class="section">
    <h2>Infographic</h2>
    <img src="../assets/image/chatbot.jpg" alt="Chatbot Benefits Infographic" />
    <p>Chatbots offer personalized, anonymous, and cost-effective mental health support with 24/7 access.</p>
  </div>

  <div class="section">
    <h2>Chatbot Interaction</h2>
    <div class="section">
      <a href="https://www.chatbot.com/">
        <img src="../assets/image/chatbot 1.webp" alt="Chatbot Interaction" />
        <span></span>
      </a>
    </div>
  </div>

  <div class="bottom-nav">
    <a href="../views/dashboard.php"> Dashboard</a>
    <a href="mood.php"> Mood</a>
    <a href="consulting.php"> Consulting</a>
    <a href="setting.php"> Setting</a>
    <a href="?action=logout"> Logout</a>
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
