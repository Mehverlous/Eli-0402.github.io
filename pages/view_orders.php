<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../images/Rynadell logo.png" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="../css/home.css">
        <link rel="stylesheet" type="text/css" href="../css/socials_login_layout.css">
        <link rel="stylesheet" type="text/css" href="../css/view_order.css">
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
            Rynadell Foods | Pending orders
        </title>
    </head>
    <body onload="modal_box();">
    
        <br>
        <?php
            include '../mysqli_connect.php';

            $firstname;
            $lastname;
            $email;
            $phone_number;
            $product_name;
            $quantity;
            $price;
            $date;

            // query the database about an order so if a new order has been added to the database 
            // query the customer id and get their name and contact information 
            // query the product id and ge the name of the product 
            // srore the information in variables for ease of use 
            // display the information using html tables 
            
            echo'<br>';
            echo'<br>';
            echo'<br>';

            echo '<div class="orders_table">
            
            <table id="myTable" align="center" border="1">
            <tr>
            <th>id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Product name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Date</th>
            <th>Order Complete</th>
            </tr>
            
            </div>';

            $query = "SELECT * FROM orders_table";
            $result = mysqli_query($conn, $query);
            $count = 0;

            while ($row = mysqli_fetch_array($result)){

                $o_ID = $row['o_ID'];
                $c_ID = $row['cID'];
                $p_ID = $row['pID'];

                $query2 = "SELECT f_name, l_name, email, p_number FROM customer_accounts_table WHERE cID = '$c_ID'";
                $result2 = mysqli_query($conn, $query2);
                $temp = mysqli_fetch_assoc($result2);

                $firstname = $temp['f_name'];
                $lastname = $temp['l_name'];
                $email = $temp['email'];
                $phone_number = $temp['p_number'];

                $query3 = "SELECT p_name FROM products_table WHERE pID = '$p_ID'";
                $result3 = mysqli_query($conn, $query3);
                $temp2 = mysqli_fetch_assoc($result3);

                $product_name = $temp2['p_name'];
                $quantity = $row['quantity'];
                $price = $row['total_price'];
                $date = $row['due_date'];
                
                echo '<tr id="somerow">';
                echo '<td id="order_id">'.$o_ID.'</td>';
                echo '<td align="center">'.$firstname.'</td>';
                echo '<td align="center">'.$lastname.'</td>';
                echo '<td align="center">'.$email.'</td>';
                echo '<td align="center">'.$phone_number.'</td>';
                echo '<td align="center">'.$product_name.'</td>';
                echo '<td align="center">'.$quantity.'</td>';
                echo '<td align="center">'.$price.'</td>';
                echo '<td align="center">'.$date.'</td>';
                echo '<td align="center"><input type="checkbox" class="checkbox" onclick="modal_box()"></td>';
                echo '<tr>';

                $count++;

            }
        ?> 

        <div id="modal">
            <div id="modal_content">
                <div id="close" onclick="closing()">+</div>
                    <form action="../php/order_complete.php" method="POST">
                    
                        <p>
                            <br>
                            <br>
                            <br>
                            If you want to remove this order form the table please input the id from the order id column and click send <br>
                            <input  type="text" id="order_num" name="order_num"/>
                            <br>
                            <br>
                            <input type="submit" id="yes" value="Yes">
                            <input type="button" id="no" value="No" onclick="closing()">
                        </p>
                        
                    </form>
            </div>
        </div>   

        <script>
    
            function modal_box(){

                var box = document.getElementsByClassName('checkbox');

                var order_length = "<?php echo $count ?>";

                for (i = 0; i < order_length; i++) { 
                
                    if(box[i].checked){

                        document.getElementById('modal').style.display = 'flex';

                    }
                }
            }

        </script>

        <script>

            document.getElementById('close').onclick = function closing() {

                document.getElementById('modal').style.display = 'none';

                var uncheck = document.getElementsByClassName('checkbox');

                var order_length = "<?php echo $count ?>";

                for (i = 0; i < order_length; i++) { 

                    uncheck[i].checked = false;

                }
            };

        </script>

        <script>

            document.getElementById('no').onclick = function closing() {

                document.getElementById('modal').style.display = 'none';

                var uncheck = document.getElementsByClassName('checkbox');

                var order_length = "<?php echo $count ?>";

                for (i = 0; i < order_length; i++) { 

                    uncheck[i].checked = false;

                }
            };

        </script>

    </body>

</html>