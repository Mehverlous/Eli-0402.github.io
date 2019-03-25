<?php

include '../mysqli_connect.php';

    if (isset($_POST['order_num'])) 
    { 

        try{

            $o_ID = $_POST['order_num'];

            $selOrder = "SELECT * FROM orders_table WHERE o_ID = '$o_ID'";
            $selResult = mysqli_query($conn, $selOrder);

            while ($row = mysqli_fetch_array($selResult)){

                $c_ID = $row['cID'];
                $p_ID = $row['pID'];
                $quantity = $row['quantity'];
                $price = $row['total_price'];
                $date = $row['due_date'];

            }

            $addOrder = "INSERT into completed_orders_table (cID, pID, quantity, total_price, due_date) VALUES ('$c_ID','$p_ID','$quantity','$price','$date')";
            $addResult = mysqli_query($conn, $addOrder);

            $delOrder = "DELETE FROM orders_table WHERE o_ID = '$o_ID'";
            $delResult = mysqli_query($conn, $delOrder);

            
        } catch(exception $e){

            echo $e->getMessage();

        }

    }

    mysqli_close($conn);

?>