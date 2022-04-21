<?php

    //Grab Data from Form
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $password = $_POST['newPassword'];
    $passwordRepeat = $_POST['repeatPassword'];

    if (empty($password) || empty($passwordRepeat)) {
       header("Location: ../login.html");
        exit();
    } else if ($password != $passwordRepeat) {
        header("Location: ../login.html");
        exit();
    }

    //Grab Current Date/Time
    $currentDate = date('U');

    //Database Connection
    $conn = new mysqli('localhost','root','','users');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    }

    //get token from database
    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= $currentDate";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
       echo "There was an error!";
       exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $selector);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to re-submit your reset request.";
            exit();
        } else {

            //Convert URL token to Binary
            $tokenBin = hex2bin($validator);

            //Check database for match
            $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);

            //If match grab email
            if ($tokenCheck === false) {
                echo "There was an error!";
            } elseif ($tokenCheck === true) {
                $tokenEmail = $row['pwdResetEmail'];

                //Store token email for later
                $sql = "SELECT * FROM users WHERE email=?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "There was an error!";
                        exit();
                    } else {

                        //Update user info with new password
                        $sql = "UPDATE users SET password=? WHERE email=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error!";
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "ss", $password, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            //delete any leftover tokens
                            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error!";
                                exit();
                            } else {

                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ./login.html");
                            }
                        }
                    }
                }
            }
        }
    }

