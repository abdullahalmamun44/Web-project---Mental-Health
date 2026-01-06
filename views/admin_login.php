<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NIRVOY Admin Login</title>
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
    .login-container {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 320px;
      text-align: center;
    }
    .logo {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }
    h2 {
      margin-bottom: 1.5rem;
      color: #333;
    }
    .input-group {
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 0.5rem;
    }
    .input-group input {
      border: none;
      outline: none;
      width: 100%;
      font-size: 1rem;
    }
    .login-btn {
      background: #28a745;
      color: white;
      border: none;
      padding: 0.7rem 1.5rem;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
      width: 100%;
    }
    .login-btn:hover {
      background: #218838;
    }
    .forgot-link {
      display: block;
      margin-top: 1rem;
      font-size: 0.9rem;
      color: #007bff;
      text-decoration: none;
    }
    .forgot-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="logo">NIRVOY</div>
    <h2>Admin Login</h2>
    <form action="../controllers/adminLoginCheck.php" method="POST">
      <div class="input-group">
        <input type="text" name="username" placeholder="Username" required />
      </div>
      <div class="input-group">
        <input type="password" name="password" placeholder="Password" required />
      </div>
      <button type="submit" class="login-btn">Log in</button>
      <a href="forgot_password.php" class="forgot-link">Forgot password?</a>
       <a href="register.php">Create Account</a> <br>
    </form>
  </div>
</body>
</html>
