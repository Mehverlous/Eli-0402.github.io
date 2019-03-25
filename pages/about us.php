<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../images/Rynadell logo.png" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="../css/home.css">
        <link rel="stylesheet" href="../css/about.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
        <link rel="stylesheet" type="text/css" href="../css/socials_login_layout.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <div class="socials_login_layout">
            <div class="social_icons">
                <br>
                <ul class="socials">
                <?php                                       
                    $login_user = false;
                    if(isset($_SESSION['login_user'])){

                        $login_user = $_SESSION['login_user'];
                        echo '<li><a href="../php/logout.php">Log out</a></li>';

                    }else{

                        echo '<li><a href="login.html">Login</a></li>';

                    } 
                ?>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="container">
            <ul class="navbar">
            <?php
                include '../mysqli_connect.php';

                $admin_query = "SELECT account_type FROM customer_accounts_table WHERE u_name = '$login_user'";

                $admin_result = mysqli_query($conn, $admin_query);

                $temp = mysqli_fetch_assoc($admin_result);

                if ($temp['account_type']!= 1){

                    echo '<li><a href="../index.php">Home</a></li>';
                    echo '<li><a href="about us.php">About us</a></li>';
                    echo '<li><a href="contact us.php">Contact us</a></li>';
                    echo '<li><a href="../php/is_online_for_order.php">Order online</a></li>';
                    echo '<li><a href="products.php">Products</a></li>';
                    echo '<li><a href="sign up.php">Sign up</a></li>';
                    

                }else {
                    echo '<li><a href="../index.php">Home</a></li>';
                    echo '<li><a href="about us.php">About us</a></li>';
                    echo '<li><a href="contact us.php">Contact us</a></li>';
                    echo '<li><a href="../php/is_online_for_order.php">Order online</a></li>';
                    echo '<li><a href="products.php">Products</a></li>';
                    echo '<li><a href="sign up.php">Sign up</a></li>';
                    echo '<li><a href="sending_mail.php">Send a mail</a></li>';
                    echo '<li><a href="view_orders.php">Pending orders</a></li>';
                }
            ?>
            </ul>
        </div>
    
        <html lang ="en">
        <title>
            Rynadell Foods | About us
        </title>
        
    </head>
    <body>
           
            <div class="information">
                <h2 style="text-align:center;">Our Mission</h2>
                <p><img class="imgae1" src="../images/images for the website/RYNADEL-01.jpg" style="width:250px;height:150px;margin-right:15px;" alt="">
                Our mission and vision is a healthier and tastier tomorrow for our beloved consumers. Typified by our motto: “A Healthier option!”. With two generations worth of experience in the production of quality pastries and chewables we are ever prepared to cater to your every need. </p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h2  style="text-align:center;">Our Leaders</h2>
                <P><img src="../images/images for the website/directors.jpg" style= "width: 100%"alt="Our team"></P>
                <p><img src="" alt=""></p>
               
            </div>
        
            <footer>
                <div id="fcontainer">
                    <div class="wrapper">
                        <ul class="links">
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="../pages/about us.php">About us</a></li>
                            <li><a href="../pages/contact us.php">Contact us</a></li>
                            <li><a href="../php/is_online_for_order.php">Order online</a></li>
                            <li><a href="../pages/products.php">Products</a></li>
                            <li><a href="../pages/sign up.php">Sign up</a></li>
                        </ul>
                    </div>
                    <div class="wrapper">
                        <div class="fsocial_icons">
                            <ul class="fsocials">
                                
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>

                            

                        

                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
    </body>
</html>