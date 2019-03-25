<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: ../pages/login.html");
   }
   header("Location: ../index.php");
