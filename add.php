<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$db=mysqli_select_db($conn,"employee");

if(isset($_POST['submit']))
{
  
   echo $name=$_POST['name'];
   echo  $phone=$_POST['phone'];
   echo  $email=$_POST['email'];
   $sql="INSERT INTO information(`NAME`, `PHONE`, `EMAIL`) VALUES ('$name','$phone','$email')";
   
if(mysqli_query($conn,$sql))
{
    echo '<script> location.replace("oh.php")</script>';
}
else
{
    echo"some thing error".$conn->error;
}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <div class="container">
    <div class="row">
        <div class="col-md-9">
                        <div class="card">
                <div class="card-header">
                   <h1>Employee Management</h1> 
                </div>
                <div class="card-body">
                <form action="add.php" method="post">
            <div class="mb-3">
            <div>
                <label>ID</label>
                <input type="number"  name="id"class="form-control">
            </div>
            <div>
                <label>NAME</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div>
                <label>Phone</label>
                <input type="number"name="phone" class="form-control">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div><br>
           
            <input type="submit" class="btn btn-primary" name="submit" value= "Register">
            </form>
                </div>
                
                </div>
        </div>
    </div>
   </div>
</body>
</html>