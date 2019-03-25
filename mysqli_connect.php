<?php

    $DB_HOST = "localhost";
    $DB_USER = "root";
    $DB_PASSWORD ="";
    $DB_NAME = "rynadell_foods";
    $sad = "Could not connect";

    $conn = mysqli_connect( $DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME) or die($sad);