<?php
    include('../controllers/sessionCheck.php');
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
        <h1>Welcome Home! <?php echo $_SESSION['username'];?></h1>

        <a href="userlist.php"> User list</a> |
        <a href="../controllers/logout.php"> logout</a>

</body>
</html>