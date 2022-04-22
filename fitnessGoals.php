<?php

        //SQL QUERY Create Table goals
        //CREATE TABLE IF NOT EXISTS goals(
        //    goal TEXT NOT NULL,
        //    dueDate DATE NOT NULL,
        //    note TEXT NOT NULL,
        //    completed BOOLEAN NOT NULL
        //);

$goal = $_POST['title'];
$dueDate = $_POST['date'];
$note = $_POST['note'];
$completed = 0;

//Connect to database
$conn = new mysqli('localhost', 'root', '', 'users');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    //Inset New Values into database
    $stmt = $conn->prepare("insert into goals(goal, dueDate, note, completed) values(?, ?, ?, ?)");
    $stmt->bind_param("sssi", $goal, $dueDate, $note, $completed);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registered successfully...";
    //Close Connection
    $stmt->close();
    $conn->close();


    header("Location: ./fitnessGoals.html", TRUE, 301);
}
