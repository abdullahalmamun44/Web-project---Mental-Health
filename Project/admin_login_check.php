<?php
session_start();
 
 
$valid_user = "admin";
$valid_pass = "1234";
 
 
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header("Location: ?page=home");
    exit();
}
 
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    if ($username === $valid_user && $password === $valid_pass) {
        $_SESSION['username'] = $username;
        header("Location: ?page=home");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
 
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

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
    h2 { margin-bottom: 1.5rem; color: #333; }
    .input-group {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 0.5rem;
    }
    .input-group input {
      border: none;
      outline: none;
      flex: 1;
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
      margin-top: 1rem;
      width: 100%;
    }
    .login-btn:hover { background: #218838; }
    .forgot-link {
      display: block;
      margin-top: 1rem;
      font-size: 0.9rem;
      color: #007bff;
      text-decoration: none;
    }
    .forgot-link:hover { text-decoration: underline; }
    nav { position: absolute; top: 1rem; left: 1rem; }
    nav a { margin-right: 10px; text-decoration: none; color: #007bff; }
  </style>
</head>
<body>
 
<?php if ($page === 'home'): ?>
  <div class="login-container">
    <div class="logo"><h1>NIRVOY</h1></div>
    <h2>Home</h2>
    <?php if(isset($_SESSION['username'])): ?>
      <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
      <a href="?action=logout" class="login-btn">Logout</a>
    <?php else: ?>
      <p>You are not logged in.</p>
      <a href="?page=login" class="login-btn">Login</a>
    <?php endif; ?>
  </div>
 
<?php elseif ($page === 'login'): ?>
  <div class="login-container">
    <div class="logo"><h1>NIRVOY</h1></div>
    <h2>Admin</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" action="">
      <div class="input-group">
        <input type="text" name="username" placeholder="Name" required />
      </div>
      <div class="input-group">
        <input type="password" name="password" placeholder="Password" required />
      </div>
      <button type="submit" class="login-btn">Log in</button>
      <a href="#" class="forgot-link">Forgot password?</a>
    </form>
  </div>
<?php endif; ?>
 
</body>
</html>