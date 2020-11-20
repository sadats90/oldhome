<?php
/**
 * User: hassan
 * Date: 11/1/2020
 * Time: 9:41 PM
 */
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "demo");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM persons";

echo "Last Inserted data read from session ";
echo "<br>";
session_start();
echo "First Name : " . $_SESSION["first_name"];
echo "<br>";
echo "Last Name : " . $_SESSION["last_name"];
echo "<br>";
echo "Email : " . $_SESSION["email"];

echo "<br>";
echo "<br>";
echo "<br>";


echo "Last Inserted data read from Cookie ";
echo "<br>";
echo "First Name : " . $_COOKIE["first_name"];
echo "<br>";
echo "Last Name : " . $_COOKIE["last_name"];
echo "<br>";
echo "Email : " . $_COOKIE["email"];

echo "<br>";
echo "<br>";
echo "<br>";

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1px black solid'>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>first_name</th>";
        echo "<th>last_name</th>";
        echo "<th>email</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>