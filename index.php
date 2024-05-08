<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
  
</style>
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
                   <button class="btn btn-success"><a href="add.php" class="text-light" id="ad">Add New</a></button>
                  
                 
                   <?php


// Establish database connection
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
 // Fetch categories from the database
$sql = "SELECT DISTINCT category FROM blogpost"; // Assuming your table name is `blogpost`
$result = $conn->query($sql);

$categories = array(); // Initialize an empty array to store categories

if ($result->num_rows > 0) {
    // Loop through each row of the result set and store categories in the array
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row['category'];
    }
} 

    elseif (isset($_GET['give']) && !empty($_GET['give'])) {

        $give = ($_GET['give']);
        $sql = "SELECT * FROM `blogpost` WHERE category = '$give' ";
      
      }

else {
    echo "0 results";
}


?>
<form  method="GET" >
<select id="categorySelect" name="give" >
    <option value="all" >All Categories</option>
    <?php foreach ($categories as $category): ?>
        <option value="<?= strtolower($category) ?>"><?= ucwords($category) ?></option>
    <?php endforeach; ?>
</select> &nbsp;
<button type="submit" class="btn btn-info">Submit</button>
</form>



                    
                    <table class="table" id="Table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                               <th></th>
                               <th></th>
                            </tr>
                        </thead>
                        <tbody>
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

                            $sql = "SELECT * FROM blogpost"; 
                            if (isset($_GET['give']) && !empty($_GET['give'])) {

                                $give = ($_GET['give']);
                                $sql = "SELECT * FROM `blogpost` WHERE category = '$give' ";
                              
                              }
                            $run = mysqli_query($conn, $sql);
                            $uid=0;
                            if (mysqli_num_rows($run) > 0) {
                                while ($row = mysqli_fetch_array($run)) {
                                    $id = $row['id'];
                                    $Title  = $row['Title'];
                                    $Description  = $row['Description'];
                                    $category=$row['category'];
                                   

                                    echo "<tr>";
                                    echo "<td>$id</td>";
                                    echo "<td>$Title</td>";
                                    echo "<td>$Description</td>";
                                    echo "<td>$category</td>";
                                   
                                    echo "<td><a href='edit.php?updateid=$id' class='btn btn-primary'>Edit</a></td>"; // Edit button with link to edit.php
                                    echo "<td><a href='delete.php?deleteid=$id' class='btn btn-danger'>Delete</a></td>"; // Delete button with link to delete.php
                                    echo "</tr>";

                                }
                                $uid++;
                            } else {
                                echo "<tr><td colspan='6'>No records found.</td></tr>";
                            }

                            mysqli_close($conn);
                            ?>
                            



                                                               
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.7.1.js"integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="crossorigin="anonymous"></script>
                                    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
                                    <script>
                                    $(document).ready( function () {
                                        $('#Table').DataTable();
                                    } );
                                    </script>



                                    </body>
                                    </html>


