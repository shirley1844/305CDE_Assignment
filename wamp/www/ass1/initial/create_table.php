<?php
$servername = "localhost";
$username = "Rin";
$password = "123";
$dbname = "login1";
$dbname2 = "data1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("<br>Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE login (
username varchar(16),
password varchar(20)
)";

if ($conn->query($sql) === TRUE) {
    echo "<br>Table created successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;
}

$conn->close();

// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname2);
// Check connection
if ($conn2->connect_error) {
    die("<br>Connection failed: " . $conn2->connect_error);
} 

// sql to create table
$sql2 = "CREATE TABLE data (
prod tinytext,
type tinytext
)";

if ($conn2->query($sql2) === TRUE) {
    echo "<br>Table created successfully";
} else {
    echo "<br>Error creating table: " . $conn2->error;
}

$conn2->close();
?>