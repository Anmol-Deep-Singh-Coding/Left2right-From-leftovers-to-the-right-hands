<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "foodlink";  // Your database name

// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
include 'db.php';

// Get data from the POST request
$name = $_POST['name'];
$food = $_POST['food'];
$quantity = $_POST['quantity'];
$expiry = $_POST['expiry'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Insert into the database
$sql = "INSERT INTO restaurants (name, food, quantity, expiry, latitude, longitude) 
        VALUES ('$name', '$food', $quantity, '$expiry', $latitude, $longitude)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
