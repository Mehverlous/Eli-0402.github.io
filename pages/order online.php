<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>        
        
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
        <link rel="shortcut icon" href="../images/Rynadell logo.png" type="image/x-icon">        
        <link rel="stylesheet" type="text/css" href="../css/home.css">
        <link rel="stylesheet" type="text/css" href="../css/order_online.css">
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
        </div>
    
        <html lang ="en">
        <title>
            Rynadell Foods | Order online
        </title>
    </head>

    <body>
        <div class="orders_form">
            <form action="../php/order_online.php" method='POST'>
                    <img src="../images/Rynadell logo.png" >
                <div class="inputbox">
                    <input list="products" name="products" required>
                        <datalist id="products">
                            <option value="Carrot Cake">Carrot Cake</option>
                            <option value="Banana Cake">Banana Cake</option>
                            <option value="Vanilla Cake">Vanilla Cake</option>
                            <option value="Chocolate Cake">Chocolate Cake</option>
                            <option value="Ripe Plantain Chips">Ripe Plantain Chips</option>
                            <option value="Savoury Plantain Chips">Savoury Plantain Chips</option>
                            <option value="Fruits and Nuts">Fruits and Nuts</option>
                        </datalist>
                        <label>Please select a product from the list bellow</label>
                </div>
                <div class="inputbox">
                    <input type="number" id="number" name="quantity" min="1" required>
                    <label>Please indicate quantity</label>
                </div>
                <div class="inputbox">
                    <input type="date" id="date" name="date" required>
                </div> 
                    <button type="submit" name="submit" >Submit</button>
            </form>

            <script>

                var number = document.getElementById('number');

                number.onkeydown = function(e) {
                    if(!((e.keyCode > 95 && e.keyCode < 106)
                    || (e.keyCode > 47 && e.keyCode < 58) 
                    || e.keyCode == 8)) {
                        return false;
                    }
                }

            </script>
            
        </div>

    </body>
</html>