<?php
    //connection to the database
    include '../mysqli_connect.php';
    session_start();

    $active ='';

    //checks whether a form was submitted by the user
    // $_SERVER array stores the request method the form 
    //is meant to submit in in this case "POST"
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // mysqli_real_escape_string(); is a function meant to reduce the ambiguity of the string as 
        //it includes strings preceeded by a quate appart of the string
        $uname = mysqli_real_escape_string($conn, $_POST['username']);
        $pword = mysqli_real_escape_string($conn, $_POST['code']);
    

        // $query2 and $result fetch information from the database pertaining to the login information to allow 
        //the rest of the script compare the values and grant users acces
        $query2 = "SELECT cID FROM customer_accounts_table WHERE u_name = '$uname' and pword = '$pword'";
        $result = mysqli_query($conn, $query2);

        //myspli_fetch_array(); creates an array of the information obtained from the database in order to compare 
        //with what the user entered in the form
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC );

        $active = $row['active'];
      
        // this portion of the code counts the number of matches that were found using the information
        // provided by the user in the form 
        $count = mysqli_num_rows($result);


        //if only one match is found as should be the case in a login then the user is allowed to login else the 
        //incorrect password or username text is printed to them
        if ($count == 1){

            $_SESSION['login_user'] = $uname;
            

            // if the above code is run the header function redirects the user to another page on the website
            header("location: ../index.php");
        }else{
            echo 'Your Login Name or Password is incorrect';
        }
    }

    mysqli_close($conn);