<!DOCTYPE hmtl>
<html>
<head>
    <title>Update Student</title>
    <link rel="stylesheet" href="AddStudents.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <h1>The University</h1>
</header>

<?php
include_once 'Config.php';
global $myConn;
if (count($_POST) > 0) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
// Replacing every non letters with an empty letter
    $firstName = $test = preg_replace('/[^a-zA-z]/', '', $firstName);
    $lastName = $test = preg_replace('/[^a-zA-z]/', '', $lastName);
    $email = $_POST["email"];
    $emptyBool = false;
    $emailBool = false;
    // Displaying a user message if first name or last name input field is empty
    if (empty($firstName && $lastName)) {
        $emptyBool = true;
    }

    // Displaying a user message if invalid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailBool = true;
    }

    // Will only update the database if fields are not empty
    if (!empty($firstName && $lastName && $email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        mysqli_query($myConn, "UPDATE student set first_name='" . $firstName . "', last_name='"
            . $lastName . "' ,email='" . $_POST['email'] . "' WHERE id='" . $_POST['id'] . "'");
        mysqli_close($myConn);
        header("location:Index.php"); // redirects to all records page
        exit;
    }
}

$result = mysqli_query($myConn, "SELECT * FROM student WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);


?>
<form method="post">
    <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
    <p>Update Student</p>
    <table>
        <tbody>
        <tr>
            <td><label>First name</label></td>
            <td><input type="text" name="firstName"
                       value="<?php echo $row['first_name']; ?>"/></td>
        </tr>
        <tr>
            <td><label>Last name</label></td>
            <td><input type="text" name="lastName"
                       value="<?php echo $row['last_name']; ?>"/></td>
        </tr>
        <tr>
            <td><label>Email address</label></td>
            <td><input type="text" name="email"
                       value="<?php echo $row['email']; ?>"/></td>
        </tr>
        <tr>
            <td><label></label></td>
            <td><input type="submit" name="submit" value="Save"/></td>
        </tr>
        </tbody>
    </table>
    <a href="Index.php">back to students view</a>

</form>
<?php
global $emptyBool;
global $emailBool;
// Displaying user error informations
if ($emptyBool) {
    echo '<span style="color:red; display: flex; justify-content: space-evenly; font-size:25px;">Empty fields!</span><br>';
}
if ($emailBool) {
    echo '<span style="color:red; display: flex; justify-content: space-evenly; font-size:25px;">Invalid email format!</span><br>';
}
?>
</body>
</html>

