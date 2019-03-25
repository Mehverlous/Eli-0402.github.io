<?php
    session_start();

    include '../mysqli_connect.php';

    $login_user = false;
    if(isset($_SESSION['login_user'])){
        $login_user = $_SESSION['login_user'];
    }

    $pname = $_POST['products'];
    $quantity = $_POST['quantity'];
    $due_date = $_POST['date'];


    $selCustomer = "SELECT cID FROM customer_accounts_table WHERE u_name = '$login_user'";
    $selProduct = "SELECT pID , p_price FROM products_table WHERE p_name = '$pname'";

    $selResult = mysqli_query($conn, $selCustomer); 
    $PselResult = mysqli_query($conn, $selProduct);

    $temp1 = mysqli_fetch_assoc($selResult);
    $temp = mysqli_fetch_assoc($PselResult);

    $c_ID = $temp1['cID'];
    $p_ID = $temp['pID'];
    $total_price = $temp['p_price'] * $quantity;

    $insCustomer = "INSERT INTO orders_table (cID, pID, quantity, total_price, due_date) VALUES ('$c_ID','$p_ID','$quantity','$total_price','$due_date')";

    $insResult = mysqli_query($conn, $insCustomer);

    if(!$insResult){
        die(mysqli_error($conn));
    }else{
        header("location: order_success.php?order=success");
    }

    mysqli_close($conn);