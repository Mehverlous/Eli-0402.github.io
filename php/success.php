<?php

// calls information from the sessions.php file that would be required from the in this page
// the rest of the page is meant to inform the uwer that they have successfully logged into the website 
// in addtion they are also given the option to log out of website
include('session.php');


?>


<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="shortcut icon" href="../images/Rynadell logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/home.css">

        <title>Success</title>
    </head>
    <body>   
        <h1>Your login was a success!!</h1>
        <?php echo $login_session; ?>
        <h2><a href = "logout.php">Sign Out</a></h2>
        <h2><a href="../index.php">Go back to the home page</a></h2>
    </body>
</html>