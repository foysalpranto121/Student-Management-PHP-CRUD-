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
    <title>Delete Student</title>
</head>
<body>
    <h2>Are you sure you want to delete this student?</h2>
    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
    <p><strong>Department:</strong> <?php echo $row['department']; ?></p>

    <form method="POST">
        <button type="submit" name="delete">Yes, Delete</button>
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['delete'])) {
    $connection->query("DELETE FROM students WHERE Id=$id");
    header("Location: index.php");
    exit;
}
?>
