<?php

    include '../mysqli_connect.php';
    ini_set('max_execution_time', 300); 
    
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    $query8 ="SELECT email FROM customer_accounts_table";

    $result6 = mysqli_query($conn, $query8);

    require '../vendor/autoload.php';


    $mail = new PHPMailer(true);                              
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com';                       
        $mail->SMTPAuth = true;                               
        $mail->Username = 'rynadellfoods@gmail.com';        
        $mail->Password = 'Bakery1234';                     
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 587;                                    
    
        //Recipients
        $mail->setFrom('ackuaku_da@soshgic.edu.gh', 'Rynadell Foods');
        while ($row = mysqli_fetch_array($result6)){
            $mail->addBCC($row['email']);
        }
    
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $_POST['subject_field'];
        $mail->Body = str_replace("\n.", "\n..", $_POST['message']);

        $mail->send();
        
        header("location: sent.php?order=success");

    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

    mysqli_close($conn);