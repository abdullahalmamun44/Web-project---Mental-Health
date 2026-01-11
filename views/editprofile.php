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

$config = json_decode('{
    "colors": {
        "primary": "#4a90e2",
        "success": "#28a745",
        "error": "#dc3545"
    },
    "messages": {
        "success": "Profile updated successfully",
        "error": "Error updating profile"
    }
}', true);

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
            $message = $config['messages']['success'];
            $messageType = "success";
            $userData = getUserByUsername($username);
        } else {
            $message = $config['messages']['error'];
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
            font-size: 24px;
        }
        
        .message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid <?php echo $config['colors']['success']; ?>;
        }
        
        .error {
            background: #ffebee;
            color: #c62828;
            border-left: 4px solid <?php echo $config['colors']['error']; ?>;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
            font-size: 14px;
        }
        
        input, select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        input:focus, select:focus {
            outline: none;
            border-color: <?php echo $config['colors']['primary']; ?>;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }
        
        .disabled {
            background: #f8f9fa;
            color: #6c757d;
            cursor: not-allowed;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        button, .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s ease;
            flex: 1;
        }
        
        .btn-primary {
            background: <?php echo $config['colors']['primary']; ?>;
            color: white;
        }
        
        .btn-primary:hover {
            background: #3a80d2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
        }
        
        .btn-secondary {
            background: white;
            color: #6c757d;
            border: 2px solid #e0e0e0;
        }
        
        .btn-secondary:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
        }
        
        .required {
            color: #ff4444;
        }
        
        .field-row {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .field-row .form-group {
            flex: 1;
            margin-bottom: 0;
        }
        
        @media (max-width: 600px) {
            .field-row {
                flex-direction: column;
                gap: 15px;
            }
            
            .button-group {
                flex-direction: column;
            }
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
            
            <div class="field-row">
                <div class="form-group">
                    <label>Phone <span class="required">*</span></label>
                    <input type="tel" name="phonenumber" value="<?php echo htmlspecialchars($userData['phonenumber'] ?? ''); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Age <span class="required">*</span></label>
                    <input type="number" name="age" min="1" max="150" value="<?php echo htmlspecialchars($userData['age'] ?? ''); ?>" required>
                </div>
            </div>
            
            <div class="field-row">
                <div class="form-group">
                    <label>Gender <span class="required">*</span></label>
                    <select name="gender" required>
                        <option value="">Select</option>
                        <option value="Male" <?php echo ($userData['gender'] ?? '') == 'Male' ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo ($userData['gender'] ?? '') == 'Female' ? 'selected' : ''; ?>>Female</option>
                        <option value="Other" <?php echo ($userData['gender'] ?? '') == 'Other' ? 'selected' : ''; ?>>Other</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Emergency Contact <span class="required">*</span></label>
                    <input type="tel" name="emergencyContact" value="<?php echo htmlspecialchars($userData['emergencyContact'] ?? ''); ?>" required>
                </div>
            </div>
            
            <div class="button-group">
                <button type="submit" name="update" class="btn-primary">Save Changes</button>
                <a href="profile.php" class="">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>