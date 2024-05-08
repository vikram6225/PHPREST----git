<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "DELETE FROM `blogpost` WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "deleted successfully!!";
        header('location:index.php');
        echo" Record Deleted Successfully";
        
    }
 
    else{
        die(mysqli_error($conn));
    }

}


?>