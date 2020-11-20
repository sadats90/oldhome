<?php
 include_once "main.php";
 include_once "connection.php";
 ?>


  <div class="container-fluid">
   <?php     
                
             

                $sql = "select doc.first_name as 'doc_f_name', doc.last_name as 'doc_l_name',sup.first_name as 'sup_f_name',sup.last_name as 'sup_l_name', 
                care1.first_name as 'care1_f_name',care1.last_name as 'care1_l_name',
                care2.first_name as 'care2_f_name',care2.last_name as 'care2_l_name',
                care3.first_name as 'care3_f_name',care3.last_name as 'care3_l_name',
                care4.first_name as 'care4_f_name',care4.last_name as 'care4_l_name'
                                        from rosters
                                        join  employees supervisor on rosters.supervisor_id = supervisor.id
                                        join  employees doctor on rosters.doctor_id = doctor.id
                                        join  employees caregiver1 on  rosters.caregiver_1_id = caregiver1.id
                                        join  employees  caregiver2 on rosters.caregiver_2_id = caregiver2.id
                                        join  employees caregiver3 on  rosters.caregiver_3_id = caregiver3.id
                                        join  employees  caregiver4 on rosters.caregiver_4_id = caregiver4.id
                                        
                                         
                                         
                                        JOIN users doc on doctor.user_id = doc.id
                                        JOIN users sup on supervisor.user_id = sup.id
                                        JOIN users care1 on caregiver1.user_id = care1.id
                                        JOIN users care2 on caregiver2.user_id = care2.id
                                        JOIN users care3 on caregiver3.user_id = care3.id
                                        JOIN users care4 on caregiver4.user_id = care4.id"; 

                    
                    
                    $query = mysqli_query($conn,$sql);
                   

                if (mysqli_num_rows($query) > 0) {
                // output data of each row
                ?>  

                <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                <th>SuperVisor</th>
                <th>Doctor</th>
                
                <th>Caregiver1</th>
                <th>Caregiver2</th>
                <th>Caregiver3</th>
                <th>Caregiver4</th>
                </tr>
                </thead>
                <?php   
                    while($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . $row['sup_f_name']." ".$row['sup_l_name'] . "</td>";
                    echo "<td>" . $row['doc_f_name']." ".$row['doc_l_name'] . "</td>";
                    echo "<td>" . $row['care1_f_name']." ".$row['care1_l_name'] . "</td>";
                    echo "<td>" . $row['care2_f_name']." ".$row['care2_l_name'] . "</td>";
                    echo "<td>" . $row['care3_f_name']." ".$row['care3_l_name'] . "</td>";
                    echo "<td>" . $row['care4_f_name']." ".$row['care4_l_name'] . "</td>";
                   
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
