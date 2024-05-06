

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
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
                    <button class="btn btn-success"><a href="add.php" class="text-light">Add New</a></button><br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Option</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "employee";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $database);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM information"; 
                            $run = mysqli_query($conn, $sql);
                            $uid=0;
                            if (mysqli_num_rows($run) > 0) {
                                while ($row = mysqli_fetch_array($run)) {
                                    $ID = $row['ID'];
                                    $NAME = $row['NAME'];
                                    $PHONE = $row['PHONE'];
                                    $EMAIL = $row['EMAIL'];

                                    echo "<tr>";
                                    echo "<td>$ID</td>";
                                    echo "<td>$NAME</td>";
                                    echo "<td>$PHONE</td>";
                                    echo "<td>$EMAIL</td>";
                                    echo "<td><a href='edit.php?id=$uid' class='btn btn-primary'>Edit</a></td>"; // Edit button with link to edit.php
                                    echo "<td><a href='delete.php?id=$uid' class='btn btn-danger'>Delete</a></td>"; // Delete button with link to delete.php
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
</body>
</html>


