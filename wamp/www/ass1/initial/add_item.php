	
	<?php
$servername = "localhost";
$username = "Rin";
$password = "123";
$logindb = "login1";
$datadb = "data1";
$L_username = "Rin3";
$L_password = "6136256";
$prod = "test";
$type = "PET";

// Create connection
$conn = new mysqli($servername, $username, $password, $logindb);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$chkid = "SELECT * FROM login WHERE username = '$L_username'";
$result = $conn->query($chkid);

if ($result->num_rows > 0) {
	
	echo "<br>Duplicate";
	//return;
	
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

// Create connection
$conn2 = new mysqli($servername, $username, $password, $datadb);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
} 

$chkpd = "SELECT * FROM data WHERE prod = '$prod'";
$result2 = $conn2->query($chkpd);

if ($result2->num_rows > 0) {
	
	echo "<br>Duplicate";
	return;
	
}else{
	
	$addpd = "INSERT INTO data (prod, type)
VALUES ('$prod', '$type')";

if ($conn2->query($addpd) === TRUE) {
    echo "New item added";
} else {
    echo "Error: " . $sql . "<br>" . $conn2->error;
}
}

$conn2->close();
?>