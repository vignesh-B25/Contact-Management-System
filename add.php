<?php
$connection = mysqli_connect("localhost", "root", "");
$db= mysqli_select_db($connection,"dbcrud");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    // Using prepared statements to prevent SQL injection
    $stmt = $connection->prepare("INSERT INTO student (Name, Address, Mobile) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $address, $mobile);

    if ($stmt->execute()) {
        echo '<script>location.replace("index.php")</script>';
    } else {
        echo 'Something went wrong: ' . $stmt->error;
    }

    $stmt->close();
}
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <title>Student Database</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Student Details</h1>
                    </div>
                    <div class="card-body">
                        <form method='post' action=''>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name='name' placeholder="Enter name" required>
                                <label>Address</label>
                                <input type="text" class="form-control" name='address' placeholder="Enter address" required>
                                <label>Mobile</label>
                                <input type="number" class="form-control" name='mobile' placeholder="Enter Mobile number" required>
                            </div>
                            <br>
                            <input type='submit' name='submit' class="btn btn-primary" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
