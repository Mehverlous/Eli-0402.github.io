<?php
   include '../mysqli_connect.php';
   session_start();
   
   $user_check = $_SESSION['login_user'];

   $ses_check = "SELECT u_name FROM customer_accounts_table WHERE u_name = '$user_check' ";
   
   $ses_sql = mysqli_query($conn, $ses_check);
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['u_name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location: login.php");
   }

   mysqli_close($conn);