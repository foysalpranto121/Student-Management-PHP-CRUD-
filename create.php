<?php

$host="localhost";
$user="root";
$password="";
$db="crud data";
$connection=new mysqli($host,$user,$password,$db);
if($connection->connect_error){
    die("Connection Failed, Try again");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students</title>
</head>
<body>
    <h2>Form to Add Students</h2>
    <form method="POST">
        Name: <input type="text" name="name"><br><br>
        Department: <input type="text" name="department"><br><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
   $name=$_POST['name'];
    $department=$_POST['department'];
  $connection->query("INSERT INTO students(name, department) VALUES ('$name', '$department')");

    header("Location: index.php");
    exit;}

?>
