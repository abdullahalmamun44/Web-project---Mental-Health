<?php
session_start();

if(!isset($_COOKIE['status']) || $_COOKIE['status'] !== 'true'){
    header('location: userlogin.php');
    exit();
}

$username = $_COOKIE['username'] ?? '';
require_once('../models/usermodel.php');
$userData = getUserByUsername($username);

if(!$userData) {
    header('location: userlogin.php');
    exit();
}

$message = '';
$messageType = '';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $fullName = trim($_POST['fullName']);
            $email = trim($_POST['email']);
        $phonenumber = trim($_POST['phonenumber']);
    $age = trim($_POST['age']);
    $gender = $_POST['gender'];
    $emergencyContact = trim($_POST['emergencyContact']);
    
    if(empty($fullName) || empty($email) || empty($phonenumber) || empty($age) || empty($emergencyContact)) {
        $message = "All fields are required";
        $messageType = "error";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format";
        $messageType = "error";
    } elseif(!is_numeric($age) || $age < 1 || $age > 150) {
        $message = "Age must be between 1 and 150";
        $messageType = "error";
    } else {
        $updateData = [
            'fullName' => $fullName,
            'email' => $email,
            'phonenumber' => $phonenumber,
            'age' => $age,
            'gender' => $gender,
            'emergencyContact' => $emergencyContact
        ];
        
        if(updateUser($username, $updateData)) {
            $message = "Profile updated successfully";
            $messageType = "success";
            $userData = getUserByUsername($username);
        } else {
            $message = "Error updating profile";
            $messageType = "error";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            text-align: center;
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
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input:focus, select:focus {
            outline: none;
                border-color: #4a90e2;
        }
        
        .disabled {
            background: #f9f9f9;
                color: #888;
        }
        
        .button-group {
                display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        button, .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            font-size: 14px;
        }
        
        .btn-primary {
            background: #4a90e2;
            color: white;
        }
        
        .btn-primary:hover {
            background: #3a80d2;
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
        }
        
        .required {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Profile</h2>
        
        <?php if($message): ?>
            <div class="message <?php echo $messageType; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Full Name <span class="required">*</span></label>
                <input type="text" name="fullName" value="<?php echo htmlspecialchars($userData['fullName'] ?? ''); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Username</label>
                <input type="text" value="<?php echo htmlspecialchars($userData['username'] ?? ''); ?>" class="disabled" disabled>
            </div>
            
            <div class="form-group">
                <label>Email <span class="required">*</span></label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($userData['email'] ?? ''); ?>" required>
            </div>
            
            <div style="display: flex; gap: 15px;">
                <div class="form-group" style="flex: 1;">
                    <label>Phone <span class="required">*</span></label>
                <input type="tel" name="phonenumber" value="<?php echo htmlspecialchars($userData['phonenumber'] ?? ''); ?>" required>
                </div>
                
                <div class="form-group" style="flex: 1;">
                    <label>Age <span class="required">*</span></label>
                <input type="number" name="age" min="1" max="150" value="<?php echo htmlspecialchars($userData['age'] ?? ''); ?>" required>
                </div>
            </div>
            
            <div style="display: flex; gap: 15px;">
                <div class="form-group" style="flex: 1;">
                    <label>Gender <span class="required">*</span></label>
                    <select name="gender" required>
                        <option value="">Select</option>
                        <option value="Male" <?php echo ($userData['gender'] ?? '') == 'Male' ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo ($userData['gender'] ?? '') == 'Female' ? 'selected' : ''; ?>>Female</option>
                        <option value="Other" <?php echo ($userData['gender'] ?? '') == 'Other' ? 'selected' : ''; ?>>Other</option>
                    </select>
                </div>
                
                <div class="form-group" style="flex: 1;">
                    <label>Emergency Contact <span class="required">*</span></label>
                <input type="tel" name="emergencyContact" value="<?php echo htmlspecialchars($userData['emergencyContact'] ?? ''); ?>" required>
                </div>
            </div>
            
            <div class="button-group">
            <button type="submit" name="update" class="btn-primary">Save Changes</button>
            <a href="profile.php" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>