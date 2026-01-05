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
  <title>Emergency Support</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
      margin: 0;
      padding: 0;
    }
 
    header {
      background: #d32f2f;
      color: white;
      padding: 1rem;
      text-align: center;
      font-size: 1.2rem;
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
 
    .chat-container {
      max-width: 600px;
      margin: 1rem auto;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
      padding: 1rem;
      height: 400px;
      overflow-y: auto;
    }
 
    .message {
      margin: 0.5rem 0;
      padding: 0.7rem;
      border-radius: 10px;
      max-width: 80%;
    }
 
    .bot {
      background: #e3f2fd;
      color: #333;
      align-self: flex-start;
    }
 
    .user {
      background: #c8e6c9;
      color: #333;
      align-self: flex-end;
      margin-left: auto;
    }
 
    .input-area {
      display: flex;
      justify-content: center;
      padding: 1rem;
      background: #fff;
      border-top: 1px solid #ddd;
    }
 
    .input-area input {
      flex: 1;
      padding: 0.7rem;
      border-radius: 20px;
      border: 1px solid #ccc;
      margin-right: 0.5rem;
    }
 
    .input-area button {
      padding: 0.7rem 1.2rem;
      border: none;
      border-radius: 20px;
      background: #4a90e2;
      color: white;
      cursor: pointer;
    }
 
    .action-buttons {
      max-width: 600px;
      margin: 1rem auto;
      text-align: center;
    }
 
    .action-buttons button {
      display: block;
      width: 100%;
      margin: 0.5rem 0;
      padding: 1rem;
      font-size: 1rem;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      transition: transform 0.2s ease;
    }
 
    .call-btn { background: #4caf50; color: white; }
    .text-btn { background: #2196f3; color: white; }
    .sos-btn { background: red; color: white; }
 
    .action-buttons button:hover { transform: scale(1.05); }
  </style>
</head>
<body>
 
  <header>
    Emergency Support
    <div class="three-dot-menu">
      <button class="dot-btn">⋮</button>
      <div class="dropdown-content">
       <a href="../controllers/logout.php">Logout</a>
      </div>
    </div>
  </header>
 
  <div class="chat-container" id="chat">
    <div class="message bot">Hello, I’m Nirvoy Emergency Assistant. How are you feeling right now?</div>
  </div>
 
  <div class="input-area">
    <input type="text" id="userInput" placeholder="Type your response..." />
    <button onclick="sendMessage()">Send</button>
  </div>
 
  <div class="action-buttons">
    <button class="call-btn" onclick="window.location.href='tel:+8801234567890'"> Call Nearest Hospital</button>
    <button class="text-btn" onclick="window.location.href='sms:+8801234567890?body=Need urgent help at my location.'">Text Nearest Clinic</button>
    <button class="sos-btn" onclick="sendSOS()"> Send SOS to Consultant</button>
  </div>
 
  <script>
    const chat = document.getElementById("chat");
 
    function sendMessage() {
      const input = document.getElementById("userInput");
      const text = input.value.trim();
      if (!text) return;
 
      const userMsg = document.createElement("div");
      userMsg.className = "message user";
      userMsg.textContent = text;
      chat.appendChild(userMsg);
 
      setTimeout(() => {
        const botMsg = document.createElement("div");
        botMsg.className = "message bot";
 
        if (text.toLowerCase().includes("pain") || text.toLowerCase().includes("hurt")) {
          botMsg.textContent = "I understand. Please use the Call button to connect with a hospital immediately.";
        } else if (text.toLowerCase().includes("anxiety") || text.toLowerCase().includes("stress")) {
          botMsg.textContent = "Take a deep breath. I recommend contacting a consultant. You can also press SOS.";
        } else {
          botMsg.textContent = "Thank you for sharing. If this feels urgent, please press SOS or Call Hospital.";
        }
 
        chat.appendChild(botMsg);
        chat.scrollTop = chat.scrollHeight;
      }, 1000);
 
      input.value = "";
    }
 
    function sendSOS() {
      alert("SOS message sent to consultant:\n\n'URGENT: Patient needs immediate support.'");
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
  </script>
 
</body>
</html>
