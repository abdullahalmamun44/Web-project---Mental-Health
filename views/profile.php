<?php
session_start();

if(!isset($_COOKIE['status']) || $_COOKIE['status'] !== 'true'){
    header('location: userlogin.php');
    exit();
}

$username = $_COOKIE['username'] ?? '';

require_once('../models/usermodel.php');
$con = getConnection();
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 1) {
    $userData = mysqli_fetch_assoc($result);
} else {
    header('location: userlogin.php');
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - NIRVOY</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }
        
        body {
            background: #f0f4f8;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #4a90e2, #63b3ed);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .profile-icon {
            width: 100px;
            height: 100px;
            background: white;
            border-radius: 50%;
            margin: 0 auto 20px;

            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: #4a90e2;
            border: 4px solid white;
        }
        
        .profile-content {
            padding: 30px;
        }
        
        .info-section {
            margin-bottom: 30px;
        }
        
        .info-section h2 {
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e0e6ed;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .info-item {
            background: #f8fafc;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #4a90e2;
        }
        
        .info-label {
            font-size: 12px;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }
        
        .info-value {
            font-size: 18px;
            color: #2d3748;
            font-weight: 600;
        }
        
        .actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid #e0e6ed;
        }
        
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-edit {
            background: #4a90e2;
            color: white;
        }
        
        .btn-edit:hover {
            background: #3a80d2;
            transform: translateY(-2px);
        }
        
        .btn-back {
            background: #e2e8f0;
            color: #4a5568;
        }
        
        .btn-back:hover {
            background: #cbd5e0;
            transform: translateY(-2px);
        }
        
        .emergency-contact {
            background: #fed7d7;
            border-left: 4px solid #fc8181;
        }
        
        .emergency-contact .info-label {
            color: #c53030;
        }
        
        .emergency-contact .info-value {
            color: #9b2c2c;
            font-weight: 700;
        }
        
        .gender-icon {
            display: inline-block;
            margin-right: 10px;
            font-size: 20px;
        }
        
        @media (max-width: 600px) {
            .container {
                margin: 10px;
            }
            
            .header {
                padding: 20px;
            }
            
            .profile-content {
                padding: 20px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="profile-icon">
                <?php echo strtoupper(substr($userData['username'], 0, 1)); ?>
            </div>
            <h1>User Profile</h1>
            <p>Welcome, <?php echo htmlspecialchars($userData['fullName'] ?? 'N/A'); ?>!</p>
        </div>
        
        <div class="profile-content">
            <div class="info-section">
                <h2>Personal Information</h2>
                <div class="info-grid">
                    <div class="info-item">
                    <div class="info-label">Full Name</div>
                    <div class="info-value"><?php echo htmlspecialchars($userData['fullName'] ?? 'N/A'); ?></div>
                    </div>
                    
                    <div class="info-item">
                    <div class="info-label">Username</div>
                    <div class="info-value"><?php echo htmlspecialchars($userData['username'] ?? 'N/A'); ?></div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Email Address</div>
                        <div class="info-value"><?php echo htmlspecialchars($userData['email'] ?? 'N/A'); ?></div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Gender</div>
                        <div class="info-value">
                            <?php 
                            $gender = $userData['gender'] ?? '';
                            $icon = '';
                            if($gender == 'Male') $icon = '👨';
                            elseif($gender == 'Female') $icon = '👩';
                            elseif($gender == 'Other') $icon = '🧑';
                            echo $icon . ' ' . htmlspecialchars($gender);
                            ?>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Age</div>
                        <div class="info-value"><?php echo htmlspecialchars($userData['age'] ?? 'N/A'); ?> years</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Phone Number</div>
                            <div class="info-value"><?php echo htmlspecialchars($userData['phonenumber'] ?? 'N/A'); ?></div>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h2>Emergency Contact</h2>
                <div class="info-grid">
                    <div class="info-item emergency-contact">
                    <div class="info-label">Emergency Contact Number</div>
                    <div class="info-value">
                        📞 <?php echo htmlspecialchars($userData['emergencyContact'] ?? 'N/A'); ?>
                    </div>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h2>Account Information</h2>
                <div class="info-grid">
                    <div class="info-item">
                    <div class="info-label">User ID</div>
                    <div class="info-value">#<?php echo htmlspecialchars($userData['username'] ?? 'N/A'); ?></div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Account Type</div>
                        <div class="info-value">Regular User</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            <span style="color: #38a169; font-weight: bold;">● Active</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="actions">
                <a href="editprofile.php" class="btn btn-edit">✏️ Edit Profile</a>
                <a href="dashboard.php" class="btn btn-back">← Back to Dashboard</a>
                <a href="../controllers/logout.php" class="btn btn-back">Logout</a>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const infoItems = document.querySelectorAll('.info-item');
            infoItems.forEach(item => {
                item.addEventListener('click', function() {
                    this.style.transform = 'scale(0.98)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 200);
                });
            });
            
            const emergencyItem = document.querySelector('.emergency-contact');
            if(emergencyItem) {
                emergencyItem.addEventListener('click', function() {
                    alert('Emergency Contact: <?php echo addslashes($userData['emergencyContact'] ?? 'Not set'); ?>');
                });
            }
        });
    </script>
</body>
</html>