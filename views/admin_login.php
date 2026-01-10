<?php
session_start();

// --- Fixed admin credentials ---
const ADMIN_USERNAME = 'admin';
const ADMIN_PASSWORD = '123';

// --- DB connection function ---
$host = "127.0.0.1";
$dbname = "webtech";
$dbuser = "root";
$dbpass = "";

function getConnection()
{
    global $host, $dbname, $dbuser, $dbpass;
    $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

// --- Login handler ---
if (isset($_POST['login'])) {
    $u = $_POST['username'] ?? '';
    $p = $_POST['password'] ?? '';
    if ($u === ADMIN_USERNAME && $p === ADMIN_PASSWORD) {
        setcookie('status', 'true', time() + 3600, '/');
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $login_error = "Invalid credentials";
    }
}

// --- Logout handler ---
if (isset($_GET['logout'])) {
    setcookie('status', '', time() - 3600, '/');
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// --- Protect dashboard ---
if (!isset($_COOKIE['status']) || $_COOKIE['status'] !== 'true') {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Admin Login</title>
    </head>

    <body>
        <h2>Admin Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <?php if (!empty($login_error))
            echo "<p style='color:red'>$login_error</p>"; ?>
    </body>

    </html>
    <?php
    exit;
}

// --- Handle user actions ---
$con = getConnection();

if (isset($_POST['action'])) {
    $act = $_POST['action'];
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($act === 'add' && $username && $password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($con, "INSERT INTO users (username, password) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashed);
        mysqli_stmt_execute($stmt);
    }

    if ($act === 'update' && $username && $password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($con, "UPDATE users SET password=? WHERE username=?");
        mysqli_stmt_bind_param($stmt, "ss", $hashed, $username);
        mysqli_stmt_execute($stmt);
    }

    if ($act === 'delete' && $username) {
        $stmt = mysqli_prepare($con, "DELETE FROM users WHERE username=?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
    }
}

// --- Fetch current users ---

mysqli_close($con);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>NIRVOY Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
        }

        .card {
            background: #fff;
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
        }

        form {
            margin-bottom: 10px;
        }

        input {
            padding: 6px;
            margin-right: 6px;
        }

        button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background: #007bff;
            color: #fff;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            padding: 4px 0;
        }

        .logout {
            background: #e74c3c;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>NIRVOY Dashboard</h1>
        <a href="?logout=1"><button class="logout">Logout</button></a>
    </div>

    <div class="card">
        <h2>User Management</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" />
            <button type="submit" name="action" value="add">Add User</button>
            <button type="submit" name="action" value="update">Update Password</button>
            <button type="submit" name="action" value="delete">Delete User</button>
        </form>
        <h3>Current Users</h3>
        <ul>


        </ul>
    </div>
</body>

</html>