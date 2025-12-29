<html>
<head>
    <title>Create Account</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(
                135deg,
                #d4f7f0,
                #b7e9d4,
                #a0d9c3
            );
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 25px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn:hover {
            background: #45a049;
        }

        .login-link {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .login-link a {
            text-decoration: none;
            color: #4CAF50;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Create Account</h2>

        <form action="../controllers/registerCheck.php" method="POST" id="createAccountForm" onsubmit="return validateForm()" enctype="">
            <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
            <input type="text" id="username" name="username" placeholder="username" required>

            <input type="tel" id="phonenumber" name="phonenumber" placeholder="Phone Number" pattern="^[0-9]{11}$" required>

            <input type="email" id="email" name="email" placeholder="Email Address" required>

            <input type="password" id="password" name="password" placeholder="Password" required>
            

            <input type="number" id="age" name="age" placeholder="Age" min="18" required>

            <select id="gender" name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>

            <input type="tel" id="emergencycontact" name="emergencycontact" placeholder="Emergency Contact" pattern="^[0-9]{11}$" required>

            <button type="submit" name="submit" class="btn">Create Account</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="userlogin.php">Login</a>
        </div>
    </div>

    <script>
        function validateForm() {
            const phonenumber = document.getElementById("phonenumber").value;
            const emergencycontact = document.getElementById("emergencycontact").value;
            const age = document.getElementById("age").value;

            if (age < 18) {
                alert("You must be at least 18 years old to create an account.");
                return false;
            }

            if (!/^\d{11}$/.test(phonenumber)) {
                alert("Please enter a valid 11-digit phone number.");
                return false;
            }

            if (!/^\d{11}$/.test(emergencycontact)) {
                alert("Please enter a valid 11-digit emergency contact number.");
                return false;
            }

            return true;
        }
    </script>

</body>

</html>
