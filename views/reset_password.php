<?php
session_start();
if(!isset($_SESSION['reset_user'])) {
    header('location: forgot_password.php');
    exit();
}
?>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NIRVOY Reset Password</title>
  
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

    .reset-container {
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

    .update-btn {
      background: #28a745;
      color: white;
      border: none;
      padding: 0.7rem 1.5rem;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
      margin-top: 1rem;
      width: 100%;
    }

    .update-btn:hover {
      background: #218838;
    }

    .cancel-link {
      display: block;
      margin-top: 1rem;
      font-size: 0.9rem;
      color: #007bff;
      text-decoration: none;
    }

    .cancel-link:hover {
      text-decoration: underline;
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
    
    .message {
      padding: 0.5rem;
      margin-bottom: 1rem;
      border-radius: 5px;
      font-size: 0.9rem;
    }
    
    .error {
      background: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
    
    .user-info {
      background: #e8f4ff;
      padding: 0.5rem;
      border-radius: 5px;
      margin-bottom: 1rem;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  
  <button class="back-btn" onclick="history.back()">Back</button>
  
  <div class="reset-container">
    <div class="logo">
      <span class="icon"></span>
      <h1>NIRVOY</h1>
    </div>
    
    <h2>Reset Password</h2>
    
    <div class="user-info">
      User: <strong><?php echo htmlspecialchars($_SESSION['reset_user']); ?></strong>
    </div>
    
    
    <form action="../controllers/update_password.php" method="post" id="resetForm">
      <input type="hidden" name="username" value="<?php echo htmlspecialchars($_SESSION['reset_user']); ?>">
      
      <div class="input-group">
        <label for="new_password">🔒</label>
        <input type="password" name="new_password" id="new_password" placeholder="New password" required />
      </div>
      
      <div class="input-group">
        <label for="confirm_password">✓</label>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required />
      </div>
      
      <button type="submit" name="submit" class="update-btn">Update Password</button>
      
      <a href="userlogin.php" class="cancel-link">← Back to Login Page</a>
    </form>
  </div>
  
  <script>
    document.getElementById('resetForm').addEventListener('submit', function(e) {
      const newPass = document.getElementById('new_password').value;
      const confirmPass = document.getElementById('confirm_password').value;
      
      if(newPass.length < 6) {
        e.preventDefault();
        alert('Password must be at least 6 characters long');
        return false;
      }
      
      if(newPass !== confirmPass) {
        e.preventDefault();
        alert('Passwords do not match');
        return false;
      }
      
      return true;
    });
  </script>
</body>
</html>