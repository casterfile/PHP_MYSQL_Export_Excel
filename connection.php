<?php 
$servername = "localhost";
$username = "adminarm";
$password = "adminarm123!!";
$dbname = "armdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
    echo "Connected Database" . "<br/><br/><br/>";
}



?>