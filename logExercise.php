<?php

        //SQL QUERY Create Table exercise
        //CREATE TABLE IF NOT EXISTS exercise(
        //    exerciseTitle TEXT NOT NULL,
        //    hours INT(10) NOT NULL,
        //    minutes INT(10) NOT NULL,
        //    caloriesBurnt INT(10) NOT NULL,
        //    completed BOOLEAN
        //);

$exerciseTItle = $_POST['title'];
$hours = $_POST['num_hrs'];
$minutes = $_POST['num_mins'];
$caloriesBurnts = $_POST['num_calories'];
$completed = 0;



//Connect to database
$conn = new mysqli('localhost', 'root', '', 'users');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    //Inset New Values into database
    $stmt = $conn->prepare("insert into exercise(exerciseTitle, hours, minutes, caloriesBurnt, completed) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("siiii", $exerciseTItle, $hours, $minutes, $caloriesBurnts, $completed);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registered successfully...";
    //Close Connection
    $stmt->close();
    $conn->close();


    header("Location: ./logExercise.html", TRUE, 301);
}
