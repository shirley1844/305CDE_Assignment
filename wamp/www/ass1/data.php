<?php

  $prod = $_POST["prod"];
  $servername = "localhost";
  $S_username = "Rin";
  $S_password = "123";
  $dbname = "data1";

  // Connect to the database
 $conn = new mysqli($servername, $S_username, $S_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

  // Query to run
  $enquiry = mysqli_query($conn,
            "SELECT * FROM data WHERE prod = '" . $prod . "'");


  // Create empty array to hold query results
  $list_Array = [];

  // Loop through query and push results into $list_Array;
  while ($row = mysqli_fetch_assoc($enquiry)) {
    array_push($list_Array, [
      'prod'   => $row['prod'],
      'type'   => $row['type']
    ]);
  }

  // Convert the Array to a JSON String and echo it
  $list_JSON = json_encode($list_Array);
  echo $list_JSON;
  $conn->close();
?>