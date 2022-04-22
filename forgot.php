<?php
    
    //SQL QUERY Create pwdReset table
    //CREATE TABLE pwdReset (
    //  pwdResetId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    //  pwdResetEmail TEXT NOT NULL,
    //  pwdResetSelector TEXT NOT NULL,
    //  pwdResetToken LONGTEXT NOT NULL,
    //  pwdResetExpires TEXT NOT NULL
    //);
    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "http://localhost:63342/IP2Project/NewPassword.php?selector=" . $selector . "&validator=" . bin2hex($token);
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
        //Encrypts token for security reasons
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }
    
    //Close Connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    //Format Email
    // Who are we sending it to.
    $to = $userEmail;
    // Subject
    $subject = 'Reset your password';
    // Message
    $message = '<p>We received a password reset request. The link to reset your password is below. ';
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

    
    