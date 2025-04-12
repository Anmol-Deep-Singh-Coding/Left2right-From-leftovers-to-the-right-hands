<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
// ... rest of your PHP code

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_sharing";  // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Select all records from the restaurants table
$sql = "SELECT * FROM restaurants";
$result = $conn->query($sql);

$restaurants = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $restaurants[] = $row;
  }
  echo json_encode($restaurants);  // Return the results as JSON
} else {
  echo "0 results";
}

$conn->close();
?>
