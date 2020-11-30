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

<div class="row">  
    <div class="col-md-4"></div>
    
    
    <div class="col-md-4">
        <form class="text-center border border-light p-5" action="login.php" method="POST">
            <p class="h4 mb-4">Sign in</p>
          
            <input type="email" id="defaultLoginFormEmail" name="email" class="form-control mb-4" placeholder="E-mail">
            
            <input type="password" id="defaultLoginFormPassword" name="password" class="form-control mb-4" placeholder="Password">
           
            <button class="btn btn-info btn-block " type="submit" name ="login">Sign in</button>
            
            <p>Not a member?
                <a href="register.php">Register</a>
            </p> 
        </div>
        </form>
    </div>



<div class="col-md-4"></div>


<?php
	
	if(isset($_POST['login'])){
		
		
	    $c_email=$_POST['email'];
		$c_pass=$_POST['password'];
		
		$sel_c="Select * FROM users WHERE password='$c_pass' AND email='$c_email'";
		
		$run_c=mysqli_query($conn, $sel_c);
		
        $check_customer=mysqli_num_rows($run_c);
        
        if($check_customer==0){
			
			echo "<script>alert('Password or Email is incorrect, plz try again!')</script>";
			exit();
        }
        
        else{
            echo "<script>alert('Logged in successfully!')</script>";
        }
		
		
		}
		
		
		
		
		// else
		// {
			
		
		// echo "<script>alert('You logged in successfully.')</script>";
		
		// }
		
	
	
	
	
	?>
		





  
</body>
</html>