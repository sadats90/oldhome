
<?php
 include_once "connection.php"
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Old Home Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown link
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
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