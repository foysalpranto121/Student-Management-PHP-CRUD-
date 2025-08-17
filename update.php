<?php

$host="localhost";
$user="root";
$password="";
$db="crud data";
$connection=new mysqli($host,$user,$password,$db);
if($connection->connect_error){
    die("Connection Failed, Try again");
}
$id=$_GET['id'];
$row=$connection->query("SELECT *FROM students WHERE id=$id")->fetch_assoc();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Students</title>
</head>
<body>
    <h2>Form to Update  Students</h2>
   <form method="POST">
        Name: <input type="text" name="name" value="<?php echo ($row['name']); ?>"><br><br>
        Department: <input type="text" name="department" value="<?php echo ($row['department']); ?>"><br><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
   $name = $connection->real_escape_string($_POST['name']);
$department = $connection->real_escape_string($_POST['department']);

$connection->query("UPDATE students SET name='$name', department='$department' WHERE Id=$id");


    header("Location: index.php");
    exit;}

?>
