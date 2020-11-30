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
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
       </div>   

     


      <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
              

            </div>
            
            <div class="col-md-4 text-center">

            <form action="login.php" method="get">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
    
            </form>
            <br>
            <form action="register.php" method="get">
              <button type="submit" class="btn btn-secondary btn-lg btn-block">Register</button>
                

            
            </form>
            
                
                
            </div>

            <div class="col-md-4  text-center">
               

            </div>


        </div>
    </div>
  </div>




  
</body>
</html>