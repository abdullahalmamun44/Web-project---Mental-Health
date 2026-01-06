<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NIRVOY Forgot Password</title>
  
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
      display: flex;
      justify-content: center;   
      align-items: center;      
      height: 100vh;             
    }

    .forgot-container {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 320px;
      text-align: center;
      position: relative;
    }

    .logo {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 0.5rem;
    }

    h2 {
      margin-bottom: 1.5rem;
      color: #333;
    }

    .input-group {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 0.5rem;
    }

    .input-group label {
      margin-right: 0.5rem;
      color: #666;
    }

    .input-group input {
      border: none;
      outline: none;
      flex: 1;
      font-size: 1rem;
    }

    .reset-btn {
      background: #007bff;
      color: white;
      border: none;
      padding: 0.7rem 1.5rem;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
      margin-top: 1rem;
      width: 100%;
    }

    .reset-btn:hover {
      background: #0056b3;
    }

    .login-link {
      display: block;
      margin-top: 1rem;
      font-size: 0.9rem;
      color: #28a745;
      text-decoration: none;
    }

    .login-link:hover {
      text-decoration: underline;
    }

    .back-icon {
      position: absolute;
      top: 1rem;
      left: 1rem;
      font-size: 1.2rem;
      cursor: pointer;
    }
    .back-btn {
      position: fixed;
      top: 15px;
      left: 15px;
      background: #6c757d;
      color: white;
      border: none;
      padding: 8px 14px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
    }
    
    /* Message styles */
    .message {
      padding: 0.5rem;
      margin-bottom: 1rem;
      border-radius: 5px;
      font-size: 0.9rem;
    }
    
    .success {
      background: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    
    .error {
      background: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>
  
  
  
  <div class="forgot-container">
    <div class="logo">
      <span class="icon"></span>
      <h1>NIRVOY</h1>
    </div>
    <br>
    
    <h2>Forgot Password</h2>
    
    
    
    <form action="../controllers/forgot_pass_Check.php" method="post" id="forgotForm">
      <div class="input-group">
        <label for="username">👤</label>
        <input type="text" name="username" id="username" placeholder="Enter your username" required />
      </div>
      
      <div class="input-group">
        <label for="email">📧</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required />
      </div>
      
      <button type="submit" name="submit" class="reset-btn">Reset Password</button>
      
      <a href="userlogin.php" class="login-link">← Back to Login</a>
    </form>
  </div>
  
  <script>
    document.getElementById('forgotForm').addEventListener('submit', function(e) {
      const username = document.getElementById('username').value.trim();
      const email = document.getElementById('email').value.trim();

      if(username == "" || email == "") {
        alert('Please fill in all fields');
        return false;
      }
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if(!emailRegex.test(email)) {
        e.preventDefault();
        alert('Please enter a valid email address');
        return false;
      }
      
      return true;
    });
  </script>
</body>
</html>