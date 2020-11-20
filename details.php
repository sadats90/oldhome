<?php
include_once 'connection.php';


$id = $_POST['pasa'];

$sql = "SELECT * from patients Where id=$id";
$make = mysqli_query($conn,$sql);



$arr = mysqli_fetch_array($make);

echo "Patient admission date: ".$arr['admission_date']. "<br>" ;
echo "Patient Emergency contact: ".$arr['emergency_contact']. "<br>";
echo "Emergency contact Relation: ".$arr['emergency_contact_relation'];



echo $id;

?>