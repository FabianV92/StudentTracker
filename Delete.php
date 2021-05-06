<?php
include "Index.php";
include "Config.php";
error_reporting(0);

global $myConn;

$row = $_GET['rn'];
$sql = "DELETE FROM student WHERE id = '$row'"; // delete query
$data = mysqli_query($myConn, $sql);
header("location:Index.php"); // forwarding to index
exit;

?>