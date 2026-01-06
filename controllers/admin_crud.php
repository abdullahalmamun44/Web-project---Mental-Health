<?php
session_start();

// --- Database connection ---
$host = "localhost";
$user = "root";
$pass = "";
$db   = "webtech";   // ✅ change to your DB name

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

// --- Login check ---
if (!isset($_SESSION['admin'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === "admin" && $password === "1234") {
            $_SESSION['admin'] = true;
            header("Location: admin_crud.php");
            exit();
        } else {
            echo "<p style='color:red;'>Invalid login!</p>";
        }
    }
    ?>
    <h2>Admin Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
    <?php
    exit();
}

// --- CRUD Operations ---
if (isset($_POST['create'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $emergencycontact = $_POST['emergencycontact'];

    $conn->query("INSERT INTO nirvoy (fullname, username, phonenumber, email, password, age, gender, emergencycontact) 
                  VALUES ('$fullname','$username','$phonenumber','$email','$password','$age','$gender','$emergencycontact')");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $emergencycontact = $_POST['emergencycontact'];

    $conn->query("UPDATE nirvoy 
                  SET fullname='$fullname', username='$username', phonenumber='$phonenumber', 
                      email='$email', password='$password', age='$age', gender='$gender', emergencycontact='$emergencycontact' 
                  WHERE id=$id");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM nirvoy WHERE id=$id");
}

// --- Read Records ---
$result = $conn->query("SELECT * FROM nirvoy");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin CRUD - Nirvoy</title>
    <style>
        table { border-collapse: collapse; width: 95%; margin: 20px auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        form { margin: 20px auto; width: 90%; text-align: center; }
        input { margin: 5px; padding: 5px; }
        button { padding: 5px 10px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Admin Dashboard - Manage Nirvoy Users</h2>

    <!-- Create Form -->
    <form method="POST">
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="phonenumber" placeholder="Phone Number" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="password" placeholder="Password" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="text" name="gender" placeholder="Gender" required>
        <input type="text" name="emergencycontact" placeholder="Emergency Contact" required>
        <button type="submit" name="create">Add User</button>
    </form>

    <!-- Display Records -->
    <table>
        <tr>
            <th>ID</th><th>Full Name</th><th>Username</th><th>Phone</th><th>Email</th>
            <th>Password</th><th>Age</th><th>Gender</th><th>Emergency Contact</th><th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <form method="POST">
                <td><?php echo $row['id']; ?>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                </td>
                <td><input type="text" name="fullname" value="<?php echo $row['fullname']; ?>"></td>
                <td><input type="text" name="username" value="<?php echo $row['username']; ?>"></td>
                <td><input type="text" name="phonenumber" value="<?php echo $row['phonenumber']; ?>"></td>
                <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
                <td><input type="text" name="password" value="<?php echo $row['password']; ?>"></td>
                <td><input type="number" name="age" value="<?php echo $row['age']; ?>"></td>
                <td><input type="text" name="gender" value="<?php echo $row['gender']; ?>"></td>
                <td><input type="text" name="emergencycontact" value="<?php echo $row['emergencycontact']; ?>"></td>
                <td>
                    <button type="submit" name="update">Update</button>
                    <a href="admin_crud.php?delete=<?php echo $row['id']; ?>" 
                       onclick="return confirm('Delete this record?')">Delete</a>
                </td>
            </form>
        </tr>
        <?php endwhile; ?>
    </table>

    <p style="text-align:center;">
        <a href="logout.php">Logout</a>
    </p>
</body>
</html>
