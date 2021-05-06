<?php

$sql= "SELECT * FROM student";
$servername = "localhost";
$username = "webstudent";
$password = "webstudent";
$dbname = "web_student_tracker";

// Create connection
$myConn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($myConn->connect_error) {
    die("Connection failed: " . $myConn->connect_error);
}
$result = $myConn->query($sql);

?>