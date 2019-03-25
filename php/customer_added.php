
<?php
 
    include_once '../mysqli_connect.php';

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mail = $_POST['email'];
    $uname = $_POST['username'];
    $pword = $_POST['code'];
    $p_num = $_POST['phone_number'];

    $query2 = "SELECT cID FROM customer_accounts_table WHERE u_name = '$uname' or email = '$mail' ";

    $result = mysqli_query($conn, $query2);

    $count = mysqli_num_rows($result);

    if ($count == 0){

        $query = "INSERT INTO customer_accounts_table (f_name, l_name, email, u_name, pword, p_number) VALUES ('$fname','$lname','$mail','$uname','$pword','$p_num')";
                    
        mysqli_query($conn, $query);

        header("location: ../index.php?signup=success");
    } else {
        die('username or email is already in use');
    }

    mysqli_close($conn);

    

