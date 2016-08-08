<?php

$method = $_SERVER['REQUEST_METHOD'];
// echo $method;
$servername = "localhost";
$S_username = "Rin";
$S_password = "123";
$dbname = "login1";

switch ($method){
case 'POST':
//echo "Here is POST";


$R_username=$_POST['username'];
$R_password=$_POST['pass'];

// Create connection
$conn = new mysqli($servername, $S_username, $S_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$check = "SELECT * FROM login WHERE username = '$R_username'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
	
	echo "Username has already been taken.";
	
}else{
	
	$reg = "INSERT INTO login (username, password)
VALUES ('$R_username', '$R_password')";

if ($conn->query($reg) === TRUE) {
    echo "New user has been registered.";
} else {
    echo "Error: " . $reg . "<br>" . $conn->error;
}
	
}
$conn->close();

 break;
case 'GET':

$L_username=$_GET['username'];
$L_password=$_GET['pass'];





// Create connection
$conn = new mysqli($servername, $S_username, $S_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$login = "SELECT * FROM login WHERE username = '$L_username' and password='$L_password'";
$result = $conn->query($login);

if ($result->num_rows > 0) {
	
	echo "Login success";
	
}else{
	
	echo "Incorrect username or password";
}

$conn->close();




 break;
case 'PUT':

// echo "Here is PUT";

    parse_str(file_get_contents("php://input"),$post_vars);

   

    $L_username=$post_vars['username'];

    $oldpass=$post_vars['oldpass'];

    $newpass=$post_vars['newpass'];

 // echo $blogid;
 // echo  $emotion;
// echo $content1;
$conn = new mysqli($servername, $S_username, $S_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $login = "SELECT * FROM login WHERE username = '$L_username' and password='$oldpass'";
$result = $conn->query($login);

if ($result->num_rows > 0) {
	
		$update = "UPDATE login SET password='$newpass' WHERE username='$L_username'";

if ($conn->query($update) === TRUE) {
    echo "Password changed successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
	
	
}else{
	 echo "Incorrect username or password";
	 return;
}
 $conn->close();

    break;

    case 'DELETE':

    parse_str(file_get_contents("php://input"),$post_vars);

 //echo "Here is Delete";

      $L_username=$post_vars['username'];
      $L_password=$post_vars['password'];

 
$conn = new mysqli($servername, $S_username, $S_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $login = "SELECT * FROM login WHERE username = '$L_username' and password='$L_password'";
$result = $conn->query($login);

if ($result->num_rows > 0) {
	$del = "DELETE from login WHERE username='$L_username'";

if ($conn->query($del) === TRUE) {
    echo "Your account have been deleted.";
} else {
    echo "Error updating record: " . $conn->error;
}
	
	
}else{
	 echo "Incorrect username or password";
	 return;
}
 $conn->close();
   
 

    break;

 

  default:

    rest_error($request); 

    break;
}
	?>