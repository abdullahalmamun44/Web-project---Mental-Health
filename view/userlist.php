<?php
    //include('../controllers/sessionCheck.php');
    //include_once('../controllers/sessionCheck.php');
    //require('../controllers/sessionCheck.php');
    require_once('sessionCheck.php');
    $users=[
        ['username'=> 'alamn', 'password'=> '123', 'email'=>'alamin@aiub.edu'],
        ['username'=> 'abc', 'password'=> '1234', 'email'=>'abc@aiub.edu'],
        ['username'=> 'xyz', 'password'=> '12', 'email'=>'xyz@aiub.edu'],
        ['username'=> 'pqr', 'password'=> '0123', 'email'=>'pqr@aiub.edu']
    ];
    $count=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
        <h2>User List</h2>
        <a href="home.php"> Back </a> |
        <a href="logout.php"> logout</a>
        <br><br>
        <table border=1>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php  foreach( $users as $u){ $count++ ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $u['username']; ?></td>
                <td><?=$u['email']?></td>
                <td>
                    <a href='edit.php?email=<?=$u['email']?>'> Edit </a> | 
                    <a href='delete.php'> Delete </a> |
                    <a href='details.php'> Details </a> 
                </td>
            </tr>
            <?php } ?>

            
        </table>
</body>
</html>