<?php  session_start();?>
<html lang="en">
<head>        
    <link rel="shortcut icon" href="../images/Rynadell logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/home.css">        
    <?php
 
        if(!isset($_SESSION['login_user'])){
            echo('Please loggin in before you are able to access this webpage');
        }else {
            header("location: ../pages/order online.php");
        }
    ?> 
</head>
<body>
    <a href="../index.php">This is a link back to the Home Page</a>
</body>
</html>