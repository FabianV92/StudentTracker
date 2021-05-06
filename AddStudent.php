<!DOCTYPE html>
<html>
<head>
    <title>PHP-Test</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="AddStudents.css">
</head>
<body>
<header>
    <h1>The University</h1>
</header>
<hr>
<form action method="post" name="form">

    <p>Add Student</p>
    <table>
        <tbody>
        <tr>
            <td><label>First Name</label></td>
            <td><input type="text" name="firstName"></td>
        </tr>
        <tr>
            <td><label>Last Name</label></td>
            <td><input type="text" name="lastName"></td>
        </tr>
        <tr>
            <td><label>Email</label></td>
            <td><input type="text" name="email"></td>
        </tr>
        <td><label></label></td>
        <td><input type="submit" name="submit" value="Send"></td>
        </tbody>
    </table>
    <a href="Index.php">back to students view</a>
</form>
<?php {
    include "Config.php";
    error_reporting(0);

    if (isset($_POST["submit"])) {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];

        // Everything except letters from a-z A-Z will be replaced to an empty letter
        $firstName = preg_replace('/[^a-zA-z]/', '', $firstName);
        $lastName = preg_replace('/[^a-zA-z]/', '', $lastName);
        $email = $_POST["email"];

        // Displaying a user message if first name or last name input field is empty
        if (empty($firstName && $lastName)) {
            echo '<span style="color:red; display: flex; justify-content: space-evenly; font-size:25px;">Empty fields!</span><br>';
        }

        // Displaying a user message if invalid email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<span style="color:red; display: flex; justify-content: space-evenly; font-size:25px;">Invalid email format!</span><br>';
        }

        global $sql;
        global $myConn;
        if (!empty($firstName && $lastName && $email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Variable 'a' is empty.<br>";
            $sql = "INSERT INTO student (first_name, last_name, email) 
        VALUES ('$firstName','$lastName','$email')";
            mysqli_query($myConn, $sql);
            mysqli_close($myConn);
            header("location:Index.php"); // redirects to all records page
            exit;
        }

    }


} ?>
</body>
</html>