

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
    <div class="container-fluid">
    
       
       
       
       
       
       

      


     <div class="row">
        <div class="col-md-6">
        <div class="container-fluid">
            
                <?php     
                
             

                        $sql = "SELECT users.first_name,users.last_name,roles.role_name FROM users 
                        join roles on roles.id = users.role_id
                        where approved=1";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        ?>  

                        <table class="table table-hover table-bordered table-striped table-secondary">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>ID</th>
                        <th>Approve</th>
                        <th>Delete</th>
                        
                        
                        </tr>
                        </thead>
                        <?php   
                            while($row = mysqli_fetch_assoc($result)) {
                               
                            echo "<tr>";
                            echo "<td>" . $row['first_name']." ".$row['last_name'] . "</td>";
                            echo "<td>" . $row['role_name']. "</td>"; 

                            echo "<td>". 
                            "<form method='post' action='details.php' > 
                            <button type='submit' value='' name='pasa'>Approve</button>  
                            </form>" 
 
                            ."</td>";

                            echo "<td>". 
                            "<form method='post' action='details.php' > 
                            <button type='submit' value='' name='pasa'>Delete</button>  
                            </form>" 
 
                            ."</td>";
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
 </div>


  
</body>
</html>