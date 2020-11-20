<?php
 include_once "connection.php";


$sql_doc = "SELECT users.role_id,users.first_name,users.last_name,employees.id,roles.role_name
FROM ((users
INNER JOIN employees ON users.id = employees.user_id)
INNER JOIN roles ON users.role_id = roles.id)
WHERE roles.id = 4"; 

$sql_patient = "SELECT users.role_id,users.first_name,users.last_name,patients.id,roles.role_name
FROM ((users
INNER JOIN patients ON users.id = patients.user_id)
INNER JOIN roles ON users.role_id = roles.id)
WHERE roles.id = 5"; 

$query_doc = mysqli_query($conn,$sql_doc);
$query_patient = mysqli_query($conn,$sql_patient);


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

<form class="text-center border border-light p-5" action="doctors_app.php" method="post">>

    <p class="h4 mb-4">Dcoctors Appoinment</p>

    <div class="form-row mb-4">

        <div class="col">
          
            <input type="text" name ="patient_id" class="form-control" placeholder="Patient ID">

        <br>

    <input placeholder="Date" class="form-control" name="date" type="text" onfocus="(this.type='date')" id="date">
    <br>
    <div>


<select class="form-control" name="doctor_id">
    <option>Doctor</option> 
    <?php
        while($DB_ROW = mysqli_fetch_array($query_doc)) 
        {
    ?>
    <option value=<?php echo $DB_ROW["id"];?>><?php echo $DB_ROW["first_name"] ." ". $DB_ROW["last_name"];?></option>
    <?php   
        }
    ?>
</select>

    </div>
    </div>
    <div class="col">      
            <h6>Patients Name:</h6>
        </div>
    </div>
    <button class="btn btn-info col-4"  name="insert_app" type="submit">OK</button>
   
</form>




<?php
if(isset($_POST['insert_app']))
{
    $patient_id = $_POST['patient_id'];
    $date =$_POST['date'];
    $doctor = $_POST['doctor_id'];

    $insert_appointment = "INSERT INTO appointments(`patient_id`,`doctor_id`,`date`) VALUES ('$patient_id','$doctor','$date')";

    $insert_app_ops = mysqli_query($conn,$insert_appointment);

}

else {
    echo "pasa";
}

?>


  
</body>
</html>