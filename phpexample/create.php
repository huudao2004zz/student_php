<?php 
include_once("config.php");
$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Check if the form is submitted (add student)
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert record into the student table
    $result = mysqli_query($mysqli, "INSERT INTO student (name, email, phone) VALUES ('$name', '$email', '$phone')");

    // Display success message after successful addition
    if($result) {
        echo "User added successfully";
    } else {
        echo "Error adding user";
    }
}

// Fetch student records
$result = mysqli_query($mysqli, "SELECT * FROM student ORDER BY id DESC");
?>

<html>
<head>
    <title>Student Management</title>
</head>
<body>
    <a href="index.php">Home</a>

    <table width='90%' border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php 
        while ($student_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$student_data['name']."</td>";
            echo "<td>".$student_data['email']."</td>";
            echo "<td>".$student_data['phone']."</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <form action="create.php" method="post" name="form">
        <table>
            <tr>
                <td>Name</td>
                <td><input width="95px" type="text" name="name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>
