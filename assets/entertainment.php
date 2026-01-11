<?php
if(!isset($_COOKIE['status']) || $_COOKIE['status'] !== 'true'){
    header('location: ../views/userlogin.php');
    exit();
}
?>
<!DOCTYPE !DOCTYPE html>
<html lang="en">
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NIRVOY Entertainment</title>
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
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: relative; 
    }

    header .title {
      font-size: 1.2rem;
      font-weight: bold;
      position: absolute; 
      left: 50%;
      transform: translateX(-50%);
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

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
      gap: 1rem;
      padding: 1rem;
    }

    .tile {
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
      text-align: center;
      padding: 0.5rem;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    .tile:hover {
      transform: scale(1.05);
    }

    .tile img {
      width: 100%;
      height: 100px;
      object-fit: cover;
      border-radius: 8px;
    }

    .tile span {
      display: block;
      margin-top: 0.5rem;
      font-size: 0.9rem;
      color: #333;
    }

    .caption {
      text-align: center;
      margin: 1rem;
      font-size: 1rem;
      color: #555;
    }

    .emergency-button {
      text-align: center;
      margin: 1rem 0;
    }

    .emergency-button button {
      background: red;
      color: white;
      border: none;
      padding: 1rem 2rem;
      border-radius: 50px;
      font-size: 1rem;
      cursor: pointer;
      box-shadow: 0 0 10px rgba(255,0,0,0.4);
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
    
  </style>
</head>
<body>

  <header>
    <div>←</div>
    <div class="title">Nirvoy</div>
    <div class="three-dot-menu">
      <button class="dot-btn">⋮</button>
      <div class="dropdown-content">
        <a href="profile.php">Profile</a>
        <a href="appointment.php">Book your Appointment</a>
      <a href="../controllers/logout.php">Logout</a>
      </div>
    </div>
  </header>

  <div class="grid">
    <div class="tile">
      <a href="https://www.crazygames.com/game/cg-fc-24" target="_blank">
        <img src="../assets/image/entertainment 1.jpg" />
        <span>CGFC 25</span>
      </a>
    </div>

    <div class="tile">
      <a href="https://poki.com/en/soccer" target="_blank">
        <img src="../assets/image/entertainment 2.jpg" />
        <span>RPG Royale</span>
      </a>
    </div>

    <div class="tile">
      <a href="https://www.empiresandpuzzles.com/" target="_blank">
        <img src="../assets/image/entertainment 3.jpg" />
        <span>Empires & Puzzles</span>
      </a>
    </div>

    <div class="tile">
      <a href="https://play.google.com/store/apps/details?id=com.mojang.minecraftpe&hl=en&pli=1" target="_blank">
        <img src="../assets/image/entertainment 4.jpg" />
        <span>Minecraft</span>
      </a>
    </div>

    <div class="tile">
      <a href="https://www.youtube.com/watch?v=uVamNlJ_TKA" target="_blank">
        <img src="../assets/image/calling my name.jpg" />
        <span>Calling My Name</span>
      </a>
    </div>

    <div class="tile">
      <a href="https://www.youtube.com/watch?v=1-NPXJRN7C4" target="_blank">
        <img src="../assets/image/song.jpg" />
        <span>Father's Love</span>
      </a>
    </div>
  </div>

  <div class="caption">
    Try these fun and effective ways to lift your mood!<br />
  </div>

  <div class="bottom-nav">
    <a href="../views/dashboard.php" class="active"> Dashboard</a>
    <a href="mood.php"> Mood</a>
    <a href="consulting.php"> Consulting</a>
    <a href="setting.php"> Setting</a>
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
