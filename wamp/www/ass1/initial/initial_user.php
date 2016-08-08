<?php
$servername = "localhost";
$username = "Rin";
$password = "123";
$dbname = "login1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//insert the initial user and password
$sql = "INSERT INTO login (username, password)
VALUES ('Rin', '6136256')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>