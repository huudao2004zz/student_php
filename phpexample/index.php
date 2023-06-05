<?php
// Load the database configuration
include_once("config.php");

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Execute the query to retrieve student records
$result = mysqli_query($mysqli, "SELECT * FROM student ORDER BY id DESC");

?>

<html>
<head>
    <title>Student Management</title>
</head>
<style>
    body {
    }
    a {
        text-decoration: none;
        font-size: 13px;

    }
    table{
         margin: auto;
    }
   section {
      text-align:center;
      display: block;

   }
   section a{
      font-size: 20px;
   }
   section a:hover{
     color: aqua;
   }
</style>
<body>
  <section ><a href="create.php" >Add New Student</a></section>
    <table width='50%' border="1">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php 
        while ($student_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$student_data['name']."</td>";
            echo "<td>".$student_data['phone']."</td>";
            echo "<td>".$student_data['email']."</td>";
            echo "<td>
                      <button><a href='edit.php?id=".$student_data['id']."'>Edit</a></button> 
                      <button><a href='delete.php?id=".$student_data['id']."'>Delete</a></button>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
