<?php

//SQL QUERY Create physiologicalDate table
// CREATE TABLE IF NOT EXISTS users (
// id INT( 10 ) NOT NULL PRIMARY KEY AUTO_INCREMENT,
// heartRate int(10),
// bloodPressure int(10),
// bloodTemperature int(10),
// bloodOxygen int(10),
// respirationRate int(10)
//);

$heartrate = $_POST['heart'];
$bloodpressure = $_POST['sys'];
$bloodtemp = $_POST['temperature'];
$bloodoxygen = $_POST['oxygen'];
$respiration = $_POST['respiration'];

//Connect to database
$conn = new mysqli('localhost', 'root', '', 'users');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    //Inset New Values into database
    $stmt = $conn->prepare("insert into physiologicaldata(heartRate, bloodPressure, bloodTemperature, bloodOxygen, respirationRate) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiii", $heartrate, $bloodpressure, $bloodtemp, $bloodoxygen, $respiration);
    //Close Connection
    $stmt->close();
    $conn->close();

    header("Location: ./physical.html", TRUE, 301);
}
