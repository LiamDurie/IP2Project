<?php
        $firstname = $_POST['firstname'];
        $secondname = $_POST['secondname'];
        $sex = $_POST['sex'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $role = 0;

        // Database Connection

        //SQL QUERY
        // CREATE TABLE IF NOT EXISTS users (
        // id INT( 10 ) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        // name VARCHAR(200) NOT NULL,
        // sex SMALLINT(6) NOT NULL,
        // email VARCHAR(200) NOT NULL UNIQUE,
        // password VARCHAR(200) NOT NULL,
        // phone VARCHAR(200),
        // age INT(10) NOT NULL,
        // role SMALLINT(6) NOT NULL
        //);

        //Connect to database
        $conn = new mysqli('localhost','root','','users');
         if($conn->connect_error){
             echo "$conn->connect_error";
             die("Connection Failed : ". $conn->connect_error);
        }else {
             //Inset New Values into database
             $stmt = $conn->prepare("insert into users(firstname, secondname, sex, email, password, phone, age, role) values(?, ?, ?, ?, ?, ?, ?, ?)");
             $stmt->bind_param("ssissiii", $firstname, $secondname, $sex, $email, $password, $phone, $age, $role);
             $execval = $stmt->execute();
             echo $execval;
             echo "Registered successfully...";
             //close connection
             $stmt->close();
             $conn->close();
             //Send user to login on completion
             ob_start();
             header("Location: ./login.html", TRUE, 301);
             ob_end_flush();
             die();
         }
