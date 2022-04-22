<?php

        //SQL QUERY Create Table reminders
        //CREATE TABLE IF NOT EXISTS reminders(
        //    reminderTitle TEXT NOT NULL,
        //    reminderTime TIME NOT NULL,
        //    reminderDate DATE NOT NULL
        // );

$reminderTitle = $_POST['title'];
$reminderTime = $_POST['time'];
$reminderDate = $_POST['date'];

//Connect to database
$conn = new mysqli('localhost', 'root', '', 'users');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    //Inset New Values into database
    $stmt = $conn->prepare("insert into reminders(reminderTitle, reminderTime, reminderDate) values(?, ?, ?)");
    $stmt->bind_param("sss", $reminderTitle, $reminderTime, $reminderDate );
    $execval = $stmt->execute();
    echo $execval;
    echo "Registered successfully...";
    //Close Connection
    $stmt->close();
    $conn->close();


    header("Location: ./reminderHistory.html", TRUE, 301);
}
