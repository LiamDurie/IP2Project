<?php

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "http://localhost:63342/IP2Project/Forgotten Password.html?selector=" . $selector . "&validator=" . bin2hex($token);
    $expires = date("U") + 1800;
    $userEmail = $_POST['email'];

    //Database Connection
    $conn = new mysqli('localhost','root','','users');
    if($conn->connect_error){
       echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    }

    //Delete any existing entries.
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
       mysqli_stmt_execute($stmt);
    }

    //Insert Token (Identifier to check if correct user trying to change password)
    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $token, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    //Format Email
    // Who are we sending it to.
    $to = $userEmail;
    // Subject
    $subject = 'Reset your password for mmtuts';
    // Message
    $message = '<p>We recieved a password reset request. The link to reset your password is below. ';
    $message .= 'If you did not make this request, you can ignore this email</p>';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';
    // Headers
    $headers = "From: HappyHealth <rpxxgaming@gmail.com>\r\n";
    $headers .= "Reply-To: rpxxgaming@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Send e-mail
    if(mail($to, $subject, $message, $headers)){
        echo "Email sent successfully to $userEmail";
    } else{
        echo "Failed";
    }
    
