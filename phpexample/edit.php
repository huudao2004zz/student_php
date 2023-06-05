<?php 
include_once('config.php');
$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $result = $mysqli->query("UPDATE student SET name='$name', email ='$email', phone='$phone' WHERE id = $id");
    header("location: index.php");
}
?>

<?php 
// Get the ID from the URL
$id = $_GET['id'];

// Fetch data based on the ID
$result = $mysqli->query("SELECT * FROM student WHERE id = $id");
while($user_data = $result->fetch_assoc()) {
    $name = $user_data['name'];
    $email = $user_data['email'];
    $phone = $user_data['phone'];
}
?>

<html>
    <head>
        <title>Edit Student</title>
    </head>
    <body>
        <a href="index.php">Home</a>
        <br><br>
        <form name="update_student" method="post" action="edit.php">
            <table border="0">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                    <td>Phone number</td>
                    <td><input type="text" name="phone" value="<?php echo $phone; ?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
