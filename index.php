<?php session_start(); ?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="shortcut icon" href="images/Rynadell logo.png" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="css/home.css">
        <link rel="stylesheet" type="text/css" href="css/info_center_layout.css">
        <link rel="stylesheet" type="text/css" href="css/slider.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/socials_login_layout.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <div class="socials_login_layout">
            <div class="social_icons">
                <ul class="socials">
                <br>  
                <?php                                       
                    $login_user = false;
                    if(isset($_SESSION['login_user'])){

                        $login_user = $_SESSION['login_user'];
                        echo '<li><a href="php/logout.php">Log out</a></li>';

                    }else{

                        echo '<li><a href="pages/login.html">Login</a></li>';

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

                    include 'mysqli_connect.php';

                    $admin_query = "SELECT account_type FROM customer_accounts_table WHERE u_name = '$login_user'";

                    $admin_result = mysqli_query($conn, $admin_query);

                    $temp = mysqli_fetch_assoc($admin_result);

                    if ($temp['account_type']!= 1){

                        echo '<li><a href="index.php">Home</a></li>';
                        echo '<li><a href="pages/about us.php">About us</a></li>';
                        echo '<li><a href="pages/contact us.php">Contact us</a></li>';
                        echo '<li><a href="php/is_online_for_order.php">Order online</a></li>';
                        echo '<li><a href="pages/products.php">Products</a></li>';
                        echo '<li><a href="pages/sign up.php">Sign up</a></li>';
                        

                    }else {
                        echo '<li><a href="index.php">Home</a></li>';
                        echo '<li><a href="pages/about us.php">About us</a></li>';
                        echo '<li><a href="pages/contact us.php">Contact us</a></li>';
                        echo '<li><a href="php/is_online_for_order.php">Order online</a></li>';
                        echo '<li><a href="pages/products.php">Products</a></li>';
                        echo '<li><a href="pages/sign up.php">Sign up</a></li>';
                        echo '<li><a href="pages/sending_mail.php">Send a mail</a></li>';
                        echo '<li><a href="pages/view_orders.php">Pending orders</a></li>';
                    }
                ?>
            </ul>
        </div>
       
        <html lang ="en">
        <title>
            Rynadell Foods | Home
        </title>
        
    </head>
    <body>
        <div class="info_center">
            <div class="main-column"> 
                <div id="slider">
                    <div id="sliderbox">
                        <img src="images/images for the website/RYNADELL ADVERT-01.jpg" style="width: 600px; height:450px;">
                        <img src="images/images for the website/fruits and nuts.jpg" style="width: 600px; height:450px;">
                        <img src="images/images for the website/atsomor tit-bits.jpg" style="width: 600px; height:450px;">
                        <img src="images/images for the website/platain chips.jpg" style="width: 600px; height:450px;">
                        <img src="images/images for the website/platain chips small.jpg" style="width: 600px; height:450px;">
                        <img src="images/images for the website/RYNADELL ADVERT-01.jpg" style="width: 600px; height:450px;">
                    </div>
                </div>
            </div>
            <div class="side-column"> 
                <div class="flexboxcontainer">
                    <div>
                        <img src="images/images for the website/Untitled-Project.jpg" alt="">
                    </div>
                    <div>
                        <img src="images/images for the website/slide2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div> 
        <div class="text">
            <div class="row1">
                <p>Welcome to Rynadell Foods! You are now at the home page feel free to move around and check out some of our products sign up as a customer to get the full Rynadell experience: receive emails concerning relevant information, and make orders from the comfort of your home.</p>
            </div>
          
        </div>

        <footer>
            <div id="fcontainer">
                <div class="wrapper">
                    <ul class="links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="pages/about us.php">About us</a></li>
                        <li><a href="pages/contact us.php">Contact us</a></li>
                        <li><a href="php/is_online_for_order.php">Order online</a></li>
                        <li><a href="pages/products.php">Products</a></li>
                        <li><a href="pages/sign up.php">Sign up</a></li>
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

