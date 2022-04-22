<?php

        //SQL QUERY Create Table nutrition
        // CREATE TABLE IF NOT EXISTS nutrition (
        // glassesofWater int(10) NOT NULL,
        // fruit int (10) NOT NULL,
        // veg int(10) NOT NULL
        //);

$glassesofwater = $_POST['num_glasses'];
$fruit = $_POST['num_fruit'];
$veg = $_POST['num_vegetables'];
$breakfast = $_POST['breakfast'];
$lunch = $_POST['lunch'];
$dinner = $_POST['dinner'];

//Connect to database
$conn = new mysqli('localhost', 'root', '', 'users');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    //Inset New Values into database
    $stmt = $conn->prepare("insert into nutrition(glassesofWater, fruit, veg) values(?, ?, ?)");
    $stmt->bind_param("iii", $glassesofwater, $fruit, $veg );
    $execval = $stmt->execute();
    echo $execval;
    $stmt = $conn->prepare("insert into fooddiary(breakfast, lunch, Dinner) values(?, ?, ?)");
    $stmt->bind_param("sss", $breakfast, $lunch, $dinner );
    $execval = $stmt->execute();
    echo $execval;
    echo "Registered successfully...";
    //Close Connection
    $stmt->close();
    $conn->close();


    header("Location: ./nutrition.html", TRUE, 301);
}
