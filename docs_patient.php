
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
       
       
       
       
       
       

      


<div class="row">

                        <div class="col-md6">


                        <div class="container-fluid">
            
                 <?php     
                 
                        $sql_upcoming = "select doc.first_name, doc.last_name, pat.first_name as 'p_f_name',pat.last_name as 'p_l_name', 
                        prescriptions.comment,prescriptions.morning_medicine,prescriptions.afternoon_medicine,prescriptions.night_medicine,prescriptions.date
                        from prescriptions
                        JOIN patients on prescriptions.patient_id = patients.id
                        join  employees on prescriptions.doctor_id = employees.id
                        JOIN users doc on employees.user_id = doc.id
                        join users pat on patients.user_id  = pat.id
                        WHERE prescriptions.doctor_id = 3 AND prescriptions.patient_id = 2";
                        $result = mysqli_query($conn, $sql_upcoming);
                        
                        

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        ?>  
                        <h3>Patient Name</h3>
                        <table class="table table-hover table-bordered table-striped table-secondary">
                        <thead>
                        <tr>
                        <th>Date</th>
                        <th>Comment</th>
                        <th>Morning Med</th>
                        <th>Afternoon Med</th>
                        <th>Night Med</th>
                        
                        
                        
                        </tr>
                        </thead>
                        <?php   
                            while($row = mysqli_fetch_assoc($result)) {
                               
                            echo "<tr>";
                           
                         
                            echo "<td>" . $row['date']. "</td>"; 
                            echo "<td>" . $row['comment']. "</td>"; 
                            echo "<td>" . $row['morning_medicine']. "</td>"; 
                            echo "<td>" . $row['afternoon_medicine']. "</td>";
                            echo "<td>" . $row['night_medicine']. "</td>";   
                            

                           
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