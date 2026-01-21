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
  <title>Nirvoy – Phobias</title>
  <style>
    :root {
      --bg-color: #f7f8ff;
      --text-color: #222;
      --card-bg: #ffffff;
      --card-shadow: rgba(0, 0, 0, 0.08);
      --title-color: #3949ab;
      --border-color: #dddddd;
      --nav-bg: #ffffff;
    }

    body.dark-mode {
      --bg-color: #121212;
      --text-color: #e0e0e0;
      --card-bg: #1e1e1e;
      --card-shadow: rgba(0, 0, 0, 0.3);
      --title-color: #8c9eff;
      --border-color: #333333;
      --nav-bg: #1e1e1e;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      transition: background 0.3s, color 0.3s;
    }

    body {
      background: var(--bg-color);
      color: var(--text-color);
      font-family: Arial, sans-serif;
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
      position: sticky;
      top: 0;
      z-index: 1001;
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
      background: var(--card-bg);
      min-width: 160px;
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
      padding: 20px 15px 100px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .phobia-card {
      background: var(--card-bg);
      border-radius: 12px;
      box-shadow: 0 2px 8px var(--card-shadow);
      padding: 20px;
      margin-bottom: 25px;
      width: 100%;
      max-width: 600px;
      border: 1px solid var(--border-color);
    }

    .phobia-header {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      gap: 15px;
    }

    .phobia-img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 12px;
      border: 2px solid var(--title-color);
    }

    .title-group {
      text-align: left;
    }

    .phobia-title {
      font-size: 20px;
      font-weight: bold;
      color: var(--title-color);
    }

    .phobia-subtitle {
      font-size: 13px;
      color: #777;
      font-style: italic;
    }

    .phobia-text {
      font-size: 14px;
      line-height: 1.6;
      margin-top: 10px;
    }

    .label {
      font-weight: bold;
      color: var(--title-color);
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      width: 100%;
      background: var(--nav-bg);
      display: flex;
      justify-content: space-around;
      padding: 12px 0;
      border-top: 1px solid var(--border-color);
    }

    .bottom-nav a {
      color: var(--text-color);
      text-decoration: none;
      font-size: 14px;
    }

    @media (max-width: 500px) {
      .phobia-header {
        flex-direction: column;
        text-align: center;
      }

      .title-group {
        text-align: center;
      }
    }
  </style>
</head>

<body>
  <div class="top-bar">
    Common Phobias
    <div class="three-dot-menu">
      <button class="dot-btn">⋮</button>
      <div class="dropdown-content">
        <a href="profile.php">👤 Profile</a>
        <a href="appointment.php">📅 Appointment</a>
        <a href="../controllers/logout.php">🚪 Logout</a>
      </div>
    </div>
  </div>

  <div class="page-wrapper">

    <section class="phobia-card">
      <div class="phobia-header">
        <img src="image/Agoraphobia.png" alt="Agoraphobia" class="phobia-img" />
        <div class="title-group">
          <div class="phobia-title">Agoraphobia</div>
          <div class="phobia-subtitle">Fear of open or crowded spaces.</div>
        </div>
      </div>
      <p class="phobia-text"><span class="label">What it is:</span> Fear of being in situations where escape might be difficult or help wouldn't be available if things go wrong.</p>
      <p class="phobia-text"><span class="label">Coping:</span> Practice "grounding" techniques and try short, timed visits to public areas with a trusted friend.</p>
    </section>

    <section class="phobia-card">
      <div class="phobia-header">
        <img src="image/ANxiety.png" alt="Social Anxiety" class="phobia-img" />
        <div class="title-group">
          <div class="phobia-title">Social Anxiety</div>
          <div class="phobia-subtitle">Fear of social situations or judgment.</div>
        </div>
      </div>
      <p class="phobia-text"><span class="label">What it is:</span> Intense anxiety about being watched, judged, or embarrassed in front of others during social interactions.</p>
      <p class="phobia-text"><span class="label">Coping:</span> Challenge "mind-reading" thoughts (assuming others think badly of you) and start with small "hello" interactions.</p>
    </section>

    <section class="phobia-card">
      <div class="phobia-header">
        <img src="image/Arachphobia.png" alt="Arachnophobia" class="phobia-img" />
        <div class="title-group">
          <div class="phobia-title">Arachnophobia</div>
          <div class="phobia-subtitle">Extreme fear of spiders.</div>
        </div>
      </div>
      <p class="phobia-text"><span class="label">What it is:</span> One of the most common phobias, where the sight or even thought of a spider triggers a fight-or-flight response.</p>
      <p class="phobia-text"><span class="label">Coping:</span> Systematic desensitization—looking at cartoons of spiders, then photos, then videos to lower the brain's alarm response.</p>
    </section>

    <section class="phobia-card">
      <div class="phobia-header">
        <img src="image/acrophobia.png" alt="Acrophobia" class="phobia-img" />
        <div class="title-group">
          <div class="phobia-title">Acrophobia</div>
          <div class="phobia-subtitle">Fear of heights.</div>
        </div>
      </div>
      <p class="phobia-text"><span class="label">What it is:</span> A nervous system reaction to being high up, often causing dizziness, shaking, or a feeling of being pulled toward the edge.</p>
      <p class="phobia-text"><span class="label">Coping:</span> Cognitive Behavioral Therapy (CBT) helps reframe the sense of danger, and virtual reality (VR) exposure is often very effective.</p>
    </section>

  </div>

  <nav class="bottom-nav">
    <a href="../views/dashboard.php">Dashboard</a>
    <a href="mood.php">Mood</a>
    <a href="consulting.php">Consulting</a>
    <a href="setting.php">Setting</a>
  </nav>

  <script>
    (function() {
      const savedFont = localStorage.getItem("nirvoyFont");
      const savedTheme = localStorage.getItem("nirvoyTheme");
      if (savedFont) document.body.style.fontFamily = savedFont;
      if (savedTheme === 'dark') document.body.classList.add('dark-mode');
    })();

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
  </script>
</body>

</html>