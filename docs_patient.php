
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

                        <div class="col-md6">


                        <div class="container-fluid">
            
                 <?php     

                        $id = $_POST['details'];
                      
                 
                        $sql_upcoming = "select doc.first_name, doc.last_name, pat.first_name as 'p_f_name',pat.last_name as 'p_l_name', 
                        prescriptions.comment,prescriptions.morning_medicine,prescriptions.afternoon_medicine,prescriptions.night_medicine,prescriptions.date
                        from prescriptions
                        JOIN patients on prescriptions.patient_id = patients.id
                        join  employees on prescriptions.doctor_id = employees.id
                        JOIN users doc on employees.user_id = doc.id
                        join users pat on patients.user_id  = pat.id
                        WHERE prescriptions.doctor_id = 3 AND prescriptions.patient_id = $id";
                        $result = mysqli_query($conn, $sql_upcoming);


                        $make = mysqli_query($conn,$sql_upcoming);



                        $arr = mysqli_fetch_array($make);

                        $f_name = $arr['p_f_name'];
                        $l_name = $arr['p_l_name'];
                        

                     
                        
                        

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        ?>  
                        <h3>Patients Name : <?php echo $f_name ." " .$l_name  ?> </h3>
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