

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

       <div class="container">
           <br>
           <br>
          
       </div>   

      


      <!-- <div class="container"> -->
       
            
                <?php     
                
             

                        $sql = "SELECT * FROM Patients";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        ?>  

                        <table class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>ID</th>
                        
                        <th>User ID</th>
                        <th>Rel</th>
                        <th>Details</th>
                        </tr>
                        </thead>
                        <?php   
                            while($row = mysqli_fetch_assoc($result)) {
                            $id1 = $row['id'];    
                            echo "<tr>";
                            echo "<td>" . $id1 . "</td>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['family_code'] . "</td>";
                            echo "<td>" . $row['emergency_contact_relation'] . "</td>";
                            echo "<td>". 
                            "<form method='post' action='details.php' > 
                            <button type='submit' value='$id1' name='pasa'>Details</button>  
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

    


        <!-- </div> -->
    </div>
  </div>




  
</body>
</html>