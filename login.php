<?php

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database Connection

    $conn = new mysqli('localhost','root','','users');
    if($conn->connect_error){
         echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    }else {
        //Grab data from database
        $stmt = $conn->prepare("select * from users where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        //Check if password and Email matches form input
        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password) {
                //If successful send to Physical Form
                echo "<h2>Login was Successful</h2>";
                header("Location: ./Physical_Form.php", TRUE, 301);
            } else {
                echo "<h2>Invalid Email or Password</h2>";
            }
        } else {
            echo "<h2>Invalid Email or Password</h2>";
        }
        //Close Connection
        $stmt->close();
        $conn->close();
        die();
    }