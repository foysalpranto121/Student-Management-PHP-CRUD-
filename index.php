<?php

$host="localhost";
$user="root";
$password="";
$db="crud data";
$connection = new mysqli($host, $user, $password, $db);

if($connection->connect_error){
    die("Connection Failed, Try again");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APP</title>
</head>
<body>
    <h1>Student Management System</h1>
    <a href="create.php">Add Students</a>

    <table border="2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Action</th>
        </tr>

        <?php
        // Fetch all students from DB
        $data = $connection->query("SELECT * FROM students");

        if ($data->num_rows > 0) {
            while($row = $data->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['Id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['department']}</td>
                        <td>
                            <a href='update.php?id={$row['Id']}'>Edit</a> | 
                            <a href='delete.php?id={$row['Id']}'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='4'>No records found</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
