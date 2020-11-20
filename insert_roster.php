<?php
 include_once "main.php";
 include_once "connection.php";


 $sql_super = "SELECT users.role_id,users.first_name,users.last_name,employees.id,roles.role_name
 FROM ((users
 INNER JOIN employees ON users.id = employees.user_id)
 INNER JOIN roles ON users.role_id = roles.id)
 WHERE roles.id = 2"; 
 
 $sql_doc = "SELECT users.role_id,users.first_name,users.last_name,employees.id,roles.role_name
 FROM ((users
 INNER JOIN employees ON users.id = employees.user_id)
 INNER JOIN roles ON users.role_id = roles.id)
 WHERE roles.id = 4"; 


$sql_care= "SELECT users.role_id,users.first_name,users.last_name,employees.id,roles.role_name
FROM ((users
INNER JOIN employees ON users.id = employees.user_id)
INNER JOIN roles ON users.role_id = roles.id)
WHERE roles.id = 3"; 


$sql_care2= "SELECT users.role_id,users.first_name,users.last_name,employees.id,roles.role_name
FROM ((users
INNER JOIN employees ON users.id = employees.user_id)
INNER JOIN roles ON users.role_id = roles.id)
WHERE roles.id = 3"; 
$sql_care3= "SELECT users.role_id,users.first_name,users.last_name,employees.id,roles.role_name
FROM ((users
INNER JOIN employees ON users.id = employees.user_id)
INNER JOIN roles ON users.role_id = roles.id)
WHERE roles.id = 3"; 
$sql_care4= "SELECT users.role_id,users.first_name,users.last_name,employees.id,roles.role_name
FROM ((users
INNER JOIN employees ON users.id = employees.user_id)
INNER JOIN roles ON users.role_id = roles.id)
WHERE roles.id = 3"; 

 
 
 $query_super = mysqli_query($conn,$sql_super);
 $query_doc = mysqli_query($conn,$sql_doc);
 $query_care = mysqli_query($conn,$sql_care); 
 $query_care2 = mysqli_query($conn,$sql_care2);
 $query_care3 = mysqli_query($conn,$sql_care3); 
 $query_care4 = mysqli_query($conn,$sql_care4);  
 
 
 
 
 ?> 




<div class="row">
<div class="col-md-6">
 <div class="container">
<form  action="insert_roster.php" method="post">

    <h2 class="h4 mb-4">New Roster</h2>

    
          

       

    <input placeholder="Date" class="form-control" name="date" type="text" onfocus="(this.type='date')" id="date">
    
    <br>


<div>  
  
  <select class="form-control" name="supervisor_id">


<option>SuperVisor</option> 
<?php
  while($DB_ROW = mysqli_fetch_array($query_super)) 
  {
?>
<option value=<?php echo $DB_ROW["id"];?>><?php echo $DB_ROW["first_name"] ." ". $DB_ROW["last_name"];?></option>
<?php   
  }
?>
</select>
</div>    
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

<br>

<div>  
  
            <select class="form-control" name="caregiver_1_id">
        

        <option>CareGiver 1</option> 
        <?php
            while($DB_ROW = mysqli_fetch_array($query_care)) 
            {
        ?>
        <option value=<?php echo $DB_ROW["id"];?>><?php echo $DB_ROW["first_name"] ." ". $DB_ROW["last_name"];?></option>
        <?php   
            }
        ?>
        </select>
</div>
<br>
<div>  
  
            <select class="form-control" name="caregiver_2_id">
        

        <option>CareGiver 2</option> 
        <?php
            while($DB_ROW = mysqli_fetch_array($query_care2)) 
            {
        ?>
        <option value=<?php echo $DB_ROW["id"];?>><?php echo $DB_ROW["first_name"] ." ". $DB_ROW["last_name"];?></option>
        <?php   
            }
        ?>
        </select>
</div>
<br>
<div>  
  
            <select class="form-control" name="caregiver_3_id">
        

        <option>CareGiver 3</option> 
        <?php
            while($DB_ROW = mysqli_fetch_array($query_care3)) 
            {
        ?>
        <option value=<?php echo $DB_ROW["id"];?>><?php echo $DB_ROW["first_name"] ." ". $DB_ROW["last_name"];?></option>
        <?php   
            }
        ?>
        </select>
</div>
<br>
<div>  
  
            <select class="form-control" name="caregiver_4_id">
        

        <option>CareGiver 4</option> 
        <?php
            while($DB_ROW = mysqli_fetch_array($query_care4)) 
            {
        ?>
        <option value=<?php echo $DB_ROW["id"];?>><?php echo $DB_ROW["first_name"] ." ". $DB_ROW["last_name"];?></option>
        <?php   
            }
        ?>
        </select>
</div>



    <br>
  
    
    <button class="btn btn-info"  name="insert_roles" type="submit">OK</button>
   
</form>


<?php
if(isset($_POST['insert_roles']))
{
    $supervisor_id = $_POST['supervisor_id'];
    $date =$_POST['date'];
    $doctor = $_POST['doctor_id'];
    $caregiver1 = $_POST['caregiver_1_id'];
    $caregiver2 = $_POST['caregiver_2_id'];
    $caregiver3 = $_POST['caregiver_3_id'];
    $caregiver4 = $_POST['caregiver_4_id'];

    $insert_appointment = "INSERT INTO rosters
    (`supervisor_id`,`doctor_id`,`caregiver_1_id`,`caregiver_2_id`,`caregiver_3_id`,`caregiver_4_id`,`date`) 
    VALUES ('$supervisor_id','$doctor','$caregiver1','$caregiver2','$caregiver3','$caregiver4','$date')";

    $insert_app_ops = mysqli_query($conn,$insert_appointment);

}

else {
    echo "pasa";
}

?>


</div>
</div>
</div>