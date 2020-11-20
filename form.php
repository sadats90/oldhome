<?php
/**
 * User: hassan
 * Date: 11/1/2020
 * Time: 9:35 PM
 */

$link = mysqli_connect("localhost", "root", "","demo");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

else {
    echo "ok";
}

// Escape user inputs for security
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];

session_start();

$_SESSION["first_name"] = $first_name;
$_SESSION["last_name"] = $last_name;
$_SESSION["email"] = $email;


setcookie("first_name", $first_name, time() + 3600, "/", "", 0);
setcookie("last_name", $last_name, time() + 3600, "/", "", 0);
setcookie("email", $email, time() + 3600, "/", "", 0);



// Attempt insert query execution
$sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
    header("Location:all.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>