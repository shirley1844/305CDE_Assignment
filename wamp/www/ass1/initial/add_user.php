	
	<?php
$servername = "localhost";
$username = "Rin";
$password = "123";
$dbname = "login1";
$L_username = "Rin3";
$L_password = "6136256";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$chkid = "SELECT * FROM login WHERE username = '$L_username'";
$result = $conn->query($chkid);

if ($result->num_rows > 0) {
	
	echo "Duplicate";
	return;
	
}else{
	
	$addusr = "INSERT INTO login (username, password)
VALUES ('$L_username', '$L_password')";

if ($conn->query($addusr) === TRUE) {
    echo "New user registered";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>