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
$db=mysqli_select_db($conn,"blog");

if(isset($_POST['submit']))
{
  
    $Title=$_POST['name'];
    $Description=$_POST['description'];
    $category =$_POST['category'];
  
   $sql="INSERT INTO blogpost(`Title`, `Description`,`category`) VALUES ('$Title','$Description','$category')";
 echo $sql; 
if(mysqli_query($conn,$sql))
{
    echo '<script> location.replace("index.php")</script>';
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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <div class="container">
    <div class="row">
        <div class="col-md-9">
                        <div class="card">
                <div class="card-header">
                   <h1>Blog Post </h1> 
                </div>
                <div class="card-body">
                <form action="add.php" method="post">
            <div class="mb-3">
            
            <div>
                <label>Title</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div>
                <label>Description</label> <br>
               <textarea name="description" rows="4" cols="105" required class="form-control"></textarea>
            </div> 
            <div>
                <label>Category</label>
                <input type="text" name="category" class="form-control" required> <br>
            </div>
           
            <input type="submit" class="btn btn-primary" name="submit" value= "ADD">
            </form>
                </div>
                
                </div>
        </div>
    </div>
   </div>
</body>
</html>