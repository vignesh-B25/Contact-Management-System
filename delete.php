<?php
$connection = mysqli_connect("localhost", "root", "");
$db= mysqli_select_db($connection,"dbcrud");
$delete=$_GET['del'];
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


    // Using prepared statements to prevent SQL injection
    $stmt = $connection->prepare("DELETE FROM student   WHERE Id=?");
     $stmt->bind_param("i",$delete);

    if ($stmt->execute()) {
        echo '<script>location.replace("index.php")</script>';
    } else {
        echo 'Something went wrong: ' . $stmt->error;
    }

    $stmt->close();

$connection->close();
?>