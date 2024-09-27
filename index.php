<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Student database</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="cal-md-row">
            <div class="card">
  <div class="card-header">
    <h1>Student details</h1>
    <div class="card-body">
        <button class='btn btn-success'><a href='add.php' class='text-light' style='text-decoration:none;'>Add New</a></button><br><br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Adress</th>
      <th scope="col">Mobile</th>
      <th scope="col" colspan='2' style='padding-left:120px;'>Options</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $connection=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"dbcrud");
     
    $sql= "select * from student";
    $run=mysqli_query($connection,$sql);
    $id=1;
    while($row=mysqli_fetch_array($run))
    {
      $uid=$row['Id'];
      $name=$row['Name'];
      $address=$row['Address'];
      $mobile=$row['Mobile'];
    
    
?>
<tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $address; ?></td>
    <td><?php echo $mobile; ?></td>
    <td><button class='btn btn-primary'><a href='edit.php? edit=<?php echo $uid ?>'style='color:black;text-decoration:none;'>Edit</a>
    </button></td>
    <td><button class='btn btn-danger'><a href='delete.php? del=<?php echo $uid ?>'style='color:black;text-decoration:none;'>Delete</a>
    </button></td>
</tr>
<?php $id++; } ?>
    
  </tbody>
    
</table>
  </div>

</div>
  </div>

</div>
            </div>
        </div>
    </div>
</body>
</html>