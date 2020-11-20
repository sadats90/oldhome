<?php
 include_once('connection.php');


$sql = "SELECT users.role_id,users.first_name,users.last_name,patients.id,roles.role_name
FROM ((users
INNER JOIN patients ON users.id = patients.id)
INNER JOIN roles ON users.role_id = roles.id)
WHERE roles.id = 4"; 

$query = mysqli_query($conn,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<form action="" method="post">



<select class="form-control" id="sel1">
<?php
    
    while($DB_ROW = mysqli_fetch_array($query)) 
    {
?>
<option></option> 
<option><?php echo $DB_ROW["first_name"] ." ". $DB_ROW["last_name"]; ?></option>



<?php
    
    }



  

?>
</select>
 
</form>

 




