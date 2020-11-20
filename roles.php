<?php
 include_once "connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<div class="row">
<div class="col-md-6">
    <div class="container-fluid">
    
<form action="roles.php" method="post">
    <input type="text" name="search" placeholder= "search"><br>
    <button class="btn btn-primary btn-sm" type="submit" name="submit-search">Search</button>
</form>
    



    <!-- for search result starts -->
    <?php
        
        // search box for searching role_name in roles table

        if(isset($_POST['submit-search']))
        {  
            
            $search = mysqli_real_escape_string($conn,$_POST['search']);
            $search_sql = "SELECT * FROM roles where role_name LIKE '%$search%'";
            $search_db = mysqli_query($conn,$search_sql);
            $query_result1 = mysqli_num_rows($search_db);
            echo($query_result1);

            if($query_result1>0)
            {
                while($search_row = mysqli_fetch_array($search_db))
                {
                    echo "<div>
                    <h3>".$search_row['id']."</h3>
                    <h3>".$search_row['role_name']."</h3>
                    <h3>".$search_row['access_level']."</h3>  
                    </div>"; 

                 }    
            }
            else
             {
                 echo "No search result";
             }
        }

          // search box for searching role_name in roles table


      else 
        {

        $sql = "SELECT * FROM roles";
        $sql_query = mysqli_query($conn, $sql);
        $chk_rows = mysqli_num_rows($sql_query);
   
        if($chk_rows>0)
        {  
        ?>  
            <table class="table table-hover table-bordered table-striped">
                <thead>
            <tr>
            <th>ID</th>
            <th>Rel</th>
            <th>Details</th>
            </tr>
        </thead>
        <?php   
            while($row = mysqli_fetch_array($sql_query))
            {   
                ?>

                <tbody>
                <?php  

                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['role_name'] . "</td>";
                echo "<td>" . $row['access_level'] . "</td>";
                echo "<tr>";
                ?>
                </tbody>
                <?php 
            
            }
            ?>  
            </table>
            <?php 
        }
        else
        {
            echo "no results";
        }
    }
    ?>
</div>
</div>



<div class="col-md-4">
<form class="text-center border border-light p-5" action="roles.php" method="post">
            <p class="h4 mb-4">Insert Roles</p>
            <!-- Email -->
            <input type="text" name ="role_name"  class="form-control mb-4" placeholder="Role Name">
            
            <input type="number" name="access_level" class="form-control mb-4" placeholder="Access Level">
            <!-- Sign in button -->
            <button class="btn btn-info btn-block" name="insert_role" type="submit">Insert Role</button>
            <!-- Register -->
           
        </div>
        </form>
</div>
</div>
 

<?php
  if (isset($_POST['insert_role']))
  {
    $role_name = $_POST['role_name'];
    $acc_level = $_POST['access_level'];

    $insert_role = "INSERT INTO roles(role_name,access_level) VALUES ('$role_name','$acc_level')";
    $insert_role_q = mysqli_query($conn,$insert_role);

  }

?>
  


</body>
</html>