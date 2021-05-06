<!DOCTYPE html>
<html>
<head>
    <title>Student list</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Index.css">
</head>
<body>
<header>
    <h1>The University</h1>
    <hr>
</header>
<div id="studentContainer">
    <p>Student list</p>
    <div class="studentData">
        <input type="button" value="Add Student"
               onclick="window.location.href='AddStudent.php'"
               id="add-student-btn">
        <table>
            <tr id="headerRow">
                <th>Id</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            // Listing students
            error_reporting(0);
            include "Config.php";
            global $result;
            global $myConn;
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {

                    // Displaying current students from db with using glue :P
                    echo "
                    <tr id='dataRows'>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["first_name"] . "</td>
                    <td>" . $row["last_name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td><a href='UpdateStudent.php?id=$row[id]'>Update</a>
                    |
                    <a href='Delete.php?rn=$row[id]'>Delete</a>
                    </td>
                     </tr>   
                    ";
                }
            } else {
                echo "0 results";
            }
            $myConn->close();
            ?>
        </table>
    </div>
</div>
</body>
</html>


