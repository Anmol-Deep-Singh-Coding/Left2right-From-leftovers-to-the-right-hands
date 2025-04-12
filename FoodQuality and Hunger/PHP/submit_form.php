<?php

// Database connection settings
$servername = "localhost";
$username = "root"; // default in XAMPP
$password = "";     // default is no password
$dbname = "leftoverconnect";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Receive data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$rating = $_POST['rating'];

// Insert into table
$sql = "INSERT INTO form_submissions (name, email, phone, message, rating)
        VALUES ('$name', '$email', '$phone', '$message', '$rating')";

if ($conn->query($sql) === TRUE) {
    // Redirect to the thank you page
    header("Location: thank_you.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
