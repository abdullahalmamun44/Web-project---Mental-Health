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
    <title>Nirvoy – Phobia</title>
    <style>
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
      }

      body {
        background: #f7f8ff;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
      }

      .top-bar {
        background: #4a90e2;
        color: white;
        padding: 1rem;
        text-align: center;
        font-size: 1.3rem;
        font-weight: bold;
        position: relative; /* allow positioning of 3-dot menu */
      }

      /* Three-dot menu styles */
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

      .page-wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 20px 40px 60px;
      }

      h1 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: #222;
      }

      .phobia {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.08);
        padding: 16px 18px;
        margin-bottom: 16px;
      }

      .phobia-title {
        font-size: 18px;
        font-weight: bold;
        color: #3949ab;
        margin-bottom: 6px;
        text-align: center;
      }

      .phobia-subtitle {
        font-size: 13px;
        color: #777;
        margin-bottom: 6px;
        text-align: center;
      }

      .phobia-text {
        font-size: 14px;
        color: #333;
        line-height: 1.4;
      }

      .phobia-name {
        font-weight: bold;
        color: #222;
        text-align: center;
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

      .images {
        display: block;
        margin: 20px auto;
        max-width: 25%;
        height: auto;
        border-radius: 8px;
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
    <div class="top-bar">
      Phobias and How to Cope
      <div class="three-dot-menu">
        <button class="dot-btn">⋮</button>
        <div class="dropdown-content">
            <a href="../controllers/logout.php">Logout</a>
        </div>
      </div>
    </div>

    <div class="page-wrapper">
      <section class="phobia">
        <img src="image/Agoraphobia.png" alt="image of Agoraphobia" class="images"/>
        <div class="phobia-title">Agoraphobia</div>
        <div class="phobia-subtitle">Fear of places where escape feels hard or help may be unavailable.</div>
        <p class="phobia-text"><span class="phobia-name">What it is:</span> Strong fear of being in crowds, public transport, or open spaces where panic might happen and feel impossible to escape.</p>
        <p class="phobia-text"><span class="phobia-name">Symptoms & how to avoid problems:</span> People often avoid going out alone, feel trapped, or have panic symptoms like racing heart and dizziness; gradual exposure with support and breathing exercises can slowly reduce this avoidance.</p>
      </section>

    </div>

    <div class="bottom-nav">
      <a href="dashboard.php">Dashboard</a>
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
