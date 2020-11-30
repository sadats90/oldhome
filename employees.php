

<?php
include_once "connection.php";
include_once "main.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>



<body>
 <div class="row">
   <div class="col-md-6">
            <div class="container-fluid">

       

                <?php     
                    $sql = "SELECT users.first_name,users.last_name,roles.role_name,employees.salary,employees.id
                    from employees
                    join users on employees.user_id = users.id
                    join roles on users.role_id = roles.id";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    ?>  

                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        
                        
                        <th>Role</th>
                        <th>Salary</th>
                        </tr>
                        </thead>
                        <?php   
                            while($row = mysqli_fetch_assoc($result)) {
                                
                            echo "<tr>";
                                
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['first_name']." ".$row['last_name'] . "</td>";
                            echo "<td>" . $row['role_name'] . "</td>";
                            echo "<td>" . $row['salary'] . "</td>";
                            
                            echo "<tr>";
                            }
                    ?>  
                        </table>
                        <?php 
                        
                        } else {
                        echo "0 results";
                        }

                ?>

       

    
            </div>

    </div>
    <div class="col-md-6">
sss
    </div>




</div>




  
</body>
</html>