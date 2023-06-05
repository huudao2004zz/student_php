<?php 
include_once("config.php");
$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM student WHERE id='$id'");
header("location: index.php");
?>
