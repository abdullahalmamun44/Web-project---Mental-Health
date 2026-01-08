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
  <title>NIRVOY Mood</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
    }

    header {
      background: #6a4caf;
      color: white;
      padding: 1rem;
      text-align: center;
      font-size: 1.2rem;
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
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }
    

    .section h2 {
      margin-bottom: 0.5rem;
      color: #333;
    }

    .section img {
      width: 300px;
      max-width: 90%;
      margin: 0.5rem 0;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }

    .links {
      margin-top: 1rem;
      font-size: 0.9rem;
    }

    .links a {
      display: block;
      margin: 0.3rem 0;
      color: #007bff;
      text-decoration: none;
    }

    .links a:hover {
      text-decoration: underline;
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
      color: #6a4caf;
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
    PSYCHIATRY Mood Disorders
    <div class="three-dot-menu">
      <button class="dot-btn">⋮</button>
      <div class="dropdown-content">
        <a href="profile.php">Profile</a>
        <a href="../controllers/logout.php">Logout</a>
      </div>
    </div>
  </header>

  <div class="section">
    <h2>Mood Disorders</h2>
    <img src="../assets/image/mood disorderd.jpg" alt="Mood Disorders Illustration" />
    <p>Understanding emotional fluctuations and mental health conditions that affect mood stability.</p>

    <div class="mood disorderd">
      <a href="https://my.clevelandclinic.org/health/diseases/17843-mood-disorders" target="_blank">Mood Swings Cleveland Clinic</a>
    </div>
  </div>

  <div class="section">
    <h2>Mood Boost</h2>
    <img src="../assets/image/mood boost.jpg" alt="Mood Boost Graphic" />
    <p>Try these fun and effective ways to lift your mood!</p>

    <div class="mood disorderd">
      <a href="https://my.clevelandclinic.org/health/diseases/17843-mood-disorders" target="_blank">Mood Swings Cleveland Clinic</a>
    </div>
  </div>

  <div class="section">
    <h2>Heart Beat Rate</h2>
    <img src="../assets/image/heart beat.jpg" alt="Heart Beat Icon" />
    <p>Track your heart rate to monitor emotional and physical well-being.</p>

    <div class="mood disorderd">
      <a href="https://my.clevelandclinic.org/health/diagnostics/heart-rate" target="_blank">Mood Swings Cleveland Clinic</a>
    </div>
  </div>

  <div class="section links">
    <h3>Helpful Resources</h3>
    <a href="https://my.clevelandclinic.org/health/symptoms/mood-swings" target="_blank">Mood Swings Cleveland Clinic</a>
    <a href="https://www.fcps.edu/student-wellness-tips/lift-your-mood" target="_blank">Lift Your Mood FCPS</a>
  </div>

  <div class="bottom-nav">
    <a href="../views/dashboard.php"> Dashboard</a>
    <a href="mood.php" class="active"> Mood</a>
    <a href="consulting.php">Consulting</a>
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
