<?php
session_start();
$conn = new mysqli("localhost", "root", "", "foodlink_db");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $user = $result->fetch_assoc();
  if (password_verify($password, $user['password'])) {
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];

    if ($user['role'] === 'donor') {
      header("Location: donor_dashboard.php");
    } else {
      header("Location: recipient_dashboard.php");
    }
  } else {
    echo "<script>alert('Incorrect password.'); window.location.href='index.html';</script>";
  }
} else {
  echo "<script>alert('User not found.'); window.location.href='index.html';</script>";
}

$conn->close();
?>
