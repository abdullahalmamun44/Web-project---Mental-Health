<?php
if (!isset($_COOKIE['status']) || $_COOKIE['status'] !== 'true') {
  header('location: ../views/userlogin.php');
  exit();
}
?>
<!DOCTYPE !DOCTYPE html>
<html lang="en">
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NIRVOY Library</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
    }

    /* Dark Mode Overrides */
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

    body.dark-mode .top-bar {
      background: #1a73e8;
      /* Slightly darker blue for dark mode header */
    }

    header {
      background: #2e8b57;
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
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
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
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .section h2 {
      margin-bottom: 0.5rem;
      color: #333;
      text-align: center;
    }

    .section img {
      width: 100%;
      max-width: 400px;
      display: block;
      margin: 0.5rem auto;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    }

    .section p {
      font-size: 0.95rem;
      color: #555;
      margin: 0.5rem 0;
      line-height: 1.5;
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
      color: #2e8b57;
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
    NIRVOY Library
    <div class="three-dot-menu">
      <button class="dot-btn">⋮</button>
      <div class="dropdown-content">
        <a href="profile.php">Profile</a>
        <a href="appointment.php">Book your Appointment</a>
         <a href="../controllers/logout.php">Logout</a>
      </div>
    </div>
  </header>

  <div class="section">
    <h2>Nature's Influence on Mental Wellness</h2>
    <img src="../assets/image/ar1.jpeg" alt="Nature and Mental Health Poster" />
    <p>Nature significantly boosts mental wellness by reducing stress hormones (cortisol), improving mood (serotonin, dopamine), enhancing cognitive functions like attention and memory, fostering feelings of awe and connection, and aiding recovery from anxiety, depression, and PTSD, with even short, regular exposures (like 2 hours/week or 20 mins/day) proving beneficial. </p>
  </div>

  <div class="section">
    <h2>Pro Tips for Mental Health Awareness</h2>
    <img src="../assets/image/articals 2..avif" alt="Mental Health Tips Poster" />
    <p>Pro tips for mental health awareness focus on building healthy habits like regular exercise, good sleep, and balanced nutrition, alongside strengthening social connections, practicing mindfulness, learning new skills, helping others, and seeking professional support when needed, all to foster a positive mindset and manage stress effectively. </p>
  </div>

  <div class="bottom-nav">
    <a href="../views/dashboard.php"> Dashboard</a>
    <a href="mood.php"> Mood</a>
    <a href="consulting.php"> Consulting</a>
    <a href="setting.php"> Setting</a>
  </div>

  <script>
    function syncSettings() {
      const savedFont = localStorage.getItem("nirvoyFont");
      if (savedFont) {
        document.body.style.fontFamily = savedFont;
      }
      const savedTheme = localStorage.getItem("nirvoyTheme");
      if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
      } else {
        document.body.classList.remove('dark-mode');
      }
    }
    syncSettings();
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
  </script><br>
</body>

</html>