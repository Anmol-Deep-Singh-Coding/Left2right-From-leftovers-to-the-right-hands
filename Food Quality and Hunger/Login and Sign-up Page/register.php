<?php
$conn = new mysqli("localhost", "root", "", "foodlink_db");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$location = $_POST['location'];
$organisation = $_POST['organisation'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];

// Check if email already exists
$check = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
  echo "<script>alert('Email already registered!'); window.location.href='index.html';</script>";
} else {
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (email, password, role, location, organisation, address, mobile) 
          VALUES ('$email', '$hashed_password', '$role', '$location', '$organisation', '$address', '$mobile')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registration successful!'); window.location.href='index.html';</script>";
  } else {
    echo "Error: " . $conn->error;
  }
}

$conn->close();
?>
