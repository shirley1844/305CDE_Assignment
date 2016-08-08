<?php
$servername = "localhost";
$username = "Rin";
$password = "123";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database for user login
$sql = "CREATE DATABASE login1";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "<br>Error creating database: " . $conn->error;
}

// Create database for data srotage

$sql2 = "CREATE DATABASE data1";
if ($conn->query($sql2) === TRUE) {
    echo "Database created successfully";
} else {
    echo "<br>Error creating database: " . $conn->error;
}

$conn->close();
?>