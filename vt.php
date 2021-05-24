<?php
$servername = "localhost";
$database = "kibrapack";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . 
mysqli_connect_error());
}
echo "<font color='white'>Connected successfully</font>";
mysqli_close($conn);
?>