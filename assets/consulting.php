<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NIRVOY Consulting</title>
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
      font-size: 1.2rem;
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

    .illustration {
      display: flex;
      justify-content: center;
      margin: 1rem;
    }

    .illustration img {
      width: 300px;
      max-width: 90%;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    .psychologist-list {
      margin: 1rem;
      padding: 1rem;
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .psychologist-list h2 {
      margin-bottom: 1rem;
      color: #333;
    }

    .psychologist a {
      display: block;
      margin: 0.5rem 0;
      padding: 0.5rem;
      font-size: 1rem;
      color: #007bff;
      text-decoration: none;
      border-bottom: 1px solid #eee;
      transition: background 0.2s ease;
    }

    .psychologist a:hover {
      background: #e6f0ff;
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
    NIRVOY Consulting
    <div class="three-dot-menu">
      <button class="dot-btn">⋮</button>
      <div class="dropdown-content">
        <a href="../controllers/logout.php">Logout</a>
      </div>
    </div>
  </header>

  <div class="illustration">
    <img src="../assets/image/condulting.jpg" alt="Counseling Illustration" />
  </div>

  <div class="psychologist-list">
    <h2>Available Psychologists</h2>
    <div class="psychologist">
      <div class="Dr. list">
        <a href="https://www.du.ac.bd/faculty/faculty_details/ECP/1610" target="_blank">👨‍⚕️ Dr. Azharul Islam, PhD (Counselling Psychologist)</a>
      </div>
      <div class="Dr. list">
        <a href="https://heliumdoc.com/bd/sharmin-haque/" target="_blank">👨‍⚕️ Ms. Sharmin Haque (Psychologist)</a>
      </div>
      <div class="Dr. list">
        <a href="https://mindsheba.com/our_team/afroja-sultana/" target="_blank">👨‍⚕️ Ms. Afroja Sultana (Senior Psychologist)</a>
      </div>
      <div class="Dr. list">
        <a href="https://mindsheba.com/our_team/hasanuzzaman-al-bannah/" target="_blank">👨‍⚕️ Mr. Hasanuzzaman Al Banna</a>
      </div>
    </div>
  </div>

  <div class="bottom-nav">
    <a href="dashboard.php"> Dashboard</a>
    <a href="mood.php"> Mood</a>
    <a href="consulting.php" class="active"> Consulting</a>
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
