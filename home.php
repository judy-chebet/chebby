<?php
session_start();
require 'db_connection.php';
// CHECK USER IF LOGGED IN
if(isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])){

    $user_email = $_SESSION['user_email'];
    $get_user_data = mysqli_query($db_connection, "SELECT * FROM `users` WHERE user_email = '$user_email'");
    $userData =  mysqli_fetch_assoc($get_user_data);

}else{
    header('Location: logout.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" media="all" type="text/css">
    <title>Home</title>
    <style>
        a, a:visited{
            color: #4CAF50;
        }
        a:hover{
            color: #0077c8;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Hello,welcome to php world <?php echo $userData['username'];?></h1>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>