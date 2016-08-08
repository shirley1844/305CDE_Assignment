<?php

$method = $_SERVER['REQUEST_METHOD'];
// echo $method;
$servername = "localhost";
$S_username = "Rin";
$S_password = "123";
$dbname = "data1";

switch ($method){
case 'POST':
//echo "Here is POST";


$prod=$_POST['prod'];
$type=$_POST['type'];

// Create connection
$conn = new mysqli($servername, $S_username, $S_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$check = "SELECT * FROM data WHERE prod = '$prod'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
	
	echo "Product already exists";
	
}else{
	//add item
	$reg = "INSERT INTO data (prod, type)
VALUES ('$prod', '$type')";

if ($conn->query($reg) === TRUE) {
    echo "Product information added.";
} else {
    echo "Error: " . $reg . "<br>" . $conn->error;
}
	
}
$conn->close();

 break;

case 'PUT':

// echo "Here is PUT";

    parse_str(file_get_contents("php://input"),$post_vars);

   

    $prod=$post_vars['prod'];

    $type=$post_vars['type'];

  

 // echo $blogid;
 // echo  $emotion;
// echo $content1;
$conn = new mysqli($servername, $S_username, $S_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $data = "SELECT * FROM data WHERE prod = '$prod'";
$result = $conn->query($data);

if ($result->num_rows > 0) {
	
		$update = "UPDATE data SET type='$type' WHERE prod='$prod'";

if ($conn->query($update) === TRUE) {
    echo "Information updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
	
	
}else{
	 echo "Item not exist.";
	 return;
}
 $conn->close();

    break;

    case 'DELETE':

    parse_str(file_get_contents("php://input"),$post_vars);

 //echo "Here is Delete";

      $prod=$post_vars['prod'];
      $type=$post_vars['type'];

 
$conn = new mysqli($servername, $S_username, $S_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $data = "SELECT * FROM data WHERE prod = '$prod' and type='$type'";
$result = $conn->query($data);

if ($result->num_rows > 0) {
	$del = "DELETE from data WHERE prod='$prod'";

if ($conn->query($del) === TRUE) {
    echo "The item has been deleted.";
} else {
    echo "Error updating record: " . $conn->error;
}
	
	
}else{
	 echo "Incorrect product name or material type.";
	 return;
}
 $conn->close();
   
 

    break;

 

  default:

    rest_error($request); 

    break;
}
	?>