<html>
<head>
    <title> User Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #d4f7f0, #b7e9d4, #a0d9c3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .back-btn {
            position: fixed;
            top: 15px;
            left: 15px;
            background: #4CAF50;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .container {
            background: white;
            padding: 35px;
            width: 420px; 
            border-radius: 15px;
            box-shadow: 0 0 12px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 26px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            font-size: 18px;
        }

        .btn:hover {
            background: #45a049;
        }

        .text-links {
            text-align: center;
            margin-top: 15px;
        }

        .text-links a {
            text-decoration: none;
            color: #4CAF50;
            display: block;
            margin: 6px 0;
            font-size: 15px;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <button class="back-btn" onclick="history.back()">Back</button>
    <div class="container">
        <h2>User Login</h2>
        <form id="loginForm" onsubmit="return validateForm()">
            <input type="text" id="username" placeholder="Username">
            <div id="usernameError" class="error"></div>
            <input type="password" id="password" placeholder="Password">
            <div id="passwordError" class="error"></div>
            <button class="btn">Login</button>
        </form>
        <div class="text-links">
            <a href="">Forgot Password?</a>
            <a href="register.php">Create Account</a>
            
        </div>
    </div>

<script>
function validateForm() {
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();
    let usernameError = document.getElementById("usernameError");
    let passwordError = document.getElementById("passwordError");
    usernameError.innerHTML = "";
    passwordError.innerHTML = "";
    let valid = true;
    if (username === "") {
        usernameError.innerHTML = "Username is required!";
        valid = false;
    }
    if (password === "") {
        passwordError.innerHTML = "Password is required!";
        valid = false;
    } else if (password.length <4 ) {
        passwordError.innerHTML = "Password must be at least 6 characters!";
        valid = false;
    }
    return valid;
}
</script>
</body>
</html>
