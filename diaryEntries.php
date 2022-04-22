<?php

        //SQL QUERY Create Table diaryentries
        //CREATE TABLE IF NOT EXISTS diaryentries(
        //    diaryTitle TEXT NOT NULL,
        //    diaryDate DATE NOT NULL,
        //    diaryEntry TEXT NOT NULL
        //);

$diaryTitle = $_POST['title'];
$diaryDate = $_POST['date'];
$diaryEntry = $_POST['entry'];

//Connect to database
$conn = new mysqli('localhost', 'root', '', 'users');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    //Inset New Values into database
    $stmt = $conn->prepare("insert into diaryentries(diaryTitle, diaryDate, diaryEntry) values(?, ?, ?)");
    $stmt->bind_param("sss", $diaryTitle, $diaryDate, $diaryEntry);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registered successfully...";
    //Close Connection
    $stmt->close();
    $conn->close();


    header("Location: ./dairyEntry.html", TRUE, 301);
}
