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

  
   if(isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

     $sql="SELECT * FROM `blogpost` WHERE id='$id'";
     $result=mysqli_query($conn,$sql);
     $row=mysqli_fetch_assoc($result);
     $title=$row['Title'];
     $description=$row['Description'];
     $category=$row['category'];

   if(isset($_POST['submit'])){
         $title=$_POST['name'];
         $description=$_POST['description'];
         $category=$_POST['category'];

         $sql = "UPDATE `blogpost` SET id='$id',Title='$title',Description='$description', category='$category' WHERE id='$id'";


         $result=mysqli_query($conn,$sql);
         if($result){
          // echo "updated successfully";
           header('location:index.php');
         }
         else{
            die(mysqli_error($conn));
         }
   }}




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
                <form  method="post">
            <div class="mb-3">
            
            <div>
                <label>Title</label>
                <input type="text" name="name" class="form-control" required value=<?php echo $title;?> >
            </div>
            <div> 
                <label>Description</label> <br>
               <textarea name="description" rows="4" cols="105" required><?php echo $description;?></textarea>
            </div>
            <div>
                <label>Category</label>
                <input type="text" name="category" class="form-control" value=<?php echo $category;?> required> <br>
            </div>
          
          
           
            <input type="submit" class="btn btn-primary" name="submit" value= "Update">
            </form>
                </div>
                
                </div>
        </div>
    </div>
   </div>
</body>
</html>



