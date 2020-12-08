<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'connection.php';
$result = mysqli_query($conn,"SELECT DISTINCT role_id,role_name from roles
join users on roles.id = users.role_id");

	
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
<!-- Default form register -->
<form class="text-center border border-light p-5" action="register.php" method="post">

    <p class="h4 mb-4">Sign ssssup</p>

    <div class="form-row mb-4">
        <div class="col">

            <select class="form-control" name="role_id">
            <?php
            
                while($DB_ROW = mysqli_fetch_array($result)) 
                {
            ?>
           
            <option value=<?php echo $DB_ROW["role_id"];?>><?php echo $DB_ROW["role_name"]; ?></option>
            <?php
                
                }
            ?>
            </select>

            
        </div>

        <div class="col">
            <!-- First name -->
            <input type="text"  name ="first_name" class="form-control" placeholder="First name">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" name="last_name"  class="form-control" placeholder="Last name">
        </div>
    </div>

    <!-- Phone number -->
    <input type="text" name="phone" class="form-control" placeholder="Phone number" >
    <br>

    <!-- E-mail -->
    <input type="email" name="email"  class="form-control mb-4" placeholder="E-mail">

    <!-- Password -->
    <input type="password" name="password"  class="form-control" placeholder="Password">
    <br>

    

    <input placeholder="Date of Birth" class="form-control" name ="date_of_birth"  type="text" onfocus="(this.type='date')" id="date">


    
    
   


    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" name="submit1" type="submit">Sign in</button>



</form>
<!-- Default form register -->



<?php


  if (isset($_POST['submit1']))
  {
     $role = $_POST['role_id'];
    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];
    $dob = $_POST['date_of_birth'];
    $app = "0";

    $insert_role = "INSERT INTO users(role_id,first_name,last_name,phone,email,date_of_birth,`password`,approved) 
                              VALUES ('$role','$f_name','$l_name','$phone','$email','$dob','$pass','$app')";
   
    $insert_role_q = mysqli_query($conn,$insert_role);
    
    
    if(!$insert_role_q)
    {
        echo "ok";
    }

  }








?>

  
</body>
</html>