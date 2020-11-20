
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

                        <div class="col-md-8">


                        <div class="container-fluid">
            
                 <?php     
                 
                        $sql_upcoming = "select care.first_name, care.last_name, pat.first_name as 'p_f_name',pat.last_name as 'p_l_name',patient_activities.has_given_morning_medicine,
                        patient_activities.has_given_afternoon_medicine,patient_activities.has_given_night_medicine,patient_activities.has_given_breakfast,patient_activities.has_given_lunch,patient_activities.has_given_dinner
                        
                        from `patient_activities`
                        JOIN patients on patient_activities.patient_id = patients.id
                        join  employees on patient_activities.caregiver_id = employees.id
                        JOIN users care on employees.user_id = care.id
                        join users pat on patients.user_id  = pat.id";
                        $result = mysqli_query($conn, $sql_upcoming);
                        
                        

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        ?>  
                        <h3>Patient Name</h3>
                        <table class="table table-hover table-bordered table-striped table-secondary">
                        <thead>
                        <tr>
                        <th>Name</th>
                        <th>Morning Medicine</th>
                        <th>Afternoon Med</th>
                        <th>Night Med</th>
                        <th>Breakfast</th>
                        <th>Lunch</th>
                        <th>Diner</th>
                        
                        
                        
                        </tr>
                        </thead>
                        <?php   
                            while($row = mysqli_fetch_assoc($result)) {
                               
                            echo "<tr>";
                           
                            
                            echo "<td>" . $row['p_f_name']." ".$row['p_l_name'] . "</td>";
                            echo "<td>" . $row['has_given_morning_medicine']. "</td>"; 
                            echo "<td>" . $row['has_given_afternoon_medicine']. "</td>"; 
                            echo "<td>" . $row['has_given_night_medicine']. "</td>";
                            echo "<td>" . $row['has_given_breakfast']. "</td>"; 
                            echo "<td>" . $row['has_given_lunch']. "</td>"; 
                            echo "<td>" . $row['has_given_dinner']. "</td>";
                             
                            

                           
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


                        <div class="col-md-4">
                        sss
                        </div>


</div>


  
</body>
</html>