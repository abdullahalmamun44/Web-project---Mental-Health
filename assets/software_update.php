
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Nirvoy – Software Update</title>
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

      /* blue header bar like other pages */
      .top-bar {
        background: #4285f4;
        color: #ffffff;
        font-weight: bold;
        text-align: center;
        padding: 10px 0;
        font-size: 20px;
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
        padding: 20px 40px 70px;
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .card {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 600px;
        padding: 20px 22px;
        margin-top: 20px;
      }

      .card-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
        text-align: center;
        color: #333;
      }

      .card-subtitle {
        font-size: 13px;
        color: #777;
        text-align: center;
        margin-bottom: 16px;
      }

      .info-row {
        font-size: 14px;
        margin-bottom: 6px;
        color: #333;
      }

      .info-label {
        font-weight: bold;
      }

      .update-avail {
        display:inline-block;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 12px;
        margin-top: 6px;
        background: #fff8e1;
        color: #ff8f00;
      }

      .progress-bar {
        width: 100%;
        height: 8px;
        border-radius: 999px;
        background: #e0e0e0;
        overflow: hidden;
        margin: 10px 0 4px;
      }

      .progress-fill {
        width: 45%;
        height: 100%;
        background: #4285f4;
      }

      .progress-text {
        font-size: 12px;
        color: #555;
        text-align: right;
        margin-bottom: 10px;
      }

      .button-row {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
      }

      .btn {
        border: none;
        border-radius: 999px;
        padding: 8px 18px;
        font-size: 14px;
        cursor: pointer;
      }

      .btn-primary {
        background: #4285f4;
        color: #ffffff;
      }

      .btn-secondary {
        background: #eeeeee;
        color: #333333;
      }

      .note {
        font-size: 12px;
        color: #777;
        margin-top: 10px;
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
    </style>
  </head>
  <body>
    <div class="top-bar">
      Software Update
      <div class="three-dot-menu">
        <button class="dot-btn">⋮</button>
        <div class="dropdown-content">
          <a href="../controllers/logout.php">Logout</a>
        </div>
      </div>
    </div>

    <div class="page-wrapper">
      <div class="card">
        <div class="card-title">NIRVOY App</div>
        <div class="card-subtitle">
          Keep your mental health tools secure and up to date.
        </div>

        <div class="info-row">
          <span class="info-label">Current version:</span> 1.0.0
        </div>
        <div class="info-row">
          <span class="info-label">Latest version:</span> 1.1.0
        </div>
        <div class="info-row">
          <span class="info-label">Update size:</span> 25 MB
        </div>

        <div class="update-avail update-avail2">Update available</div>

        <div class="progress-bar">
          <div class="progress-fill"></div>
        </div>
        <div class="progress-text">Downloading… 45%</div>

        <div class="button-row">
          <button class="btn btn-primary">Download & Install</button>
          <button class="btn btn-secondary">Later</button>
        </div>

        <div class="note">
          Tip: Connect to Wi‑Fi and keep your device charged while updating.
        </div>
      </div>
    </div>

    <div class="bottom-nav">
      <a href="dashboard.html">Dashboard</a>
      <a href="mood.html">Mood</a>
      <a href="consulting.html">Consulting</a>
      <a href="setting.html" class="active">Setting</a>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const laterBtn = document.querySelector(".btn-secondary");
        if (laterBtn) {
          laterBtn.addEventListener("click", function () {
            window.location.href = "setting.html";
          });
        }

        const downloadBtn = document.querySelector(".btn-primary");
        if (downloadBtn) {
          downloadBtn.addEventListener("click", function () {
            alert("Download started...");
          });
        }

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
      });
    </script>
  </body>
</html>
