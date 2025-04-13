<?php
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

// Volunteer-specific fields
$full_name = $_POST['full_name'] ?? '';
$occupation = $_POST['occupation'] ?? '';
$volunteer_mobile = $_POST['volunteer_mobile'] ?? '';

// Donor/Recipient-specific fields
$organisation_name = $_POST['organisation'] ?? '';
$location = $_POST['location'] ?? '';
$address = $_POST['address'] ?? '';
$mobile = $_POST['mobile'] ?? '';

// Check if email already exists
$check = $conn->prepare("SELECT * FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('Email already registered!'); window.location.href='index.html';</script>";
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into users table (only email, password, and role)
$stmt = $conn->prepare("INSERT INTO users (email, password, role, registration_date) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("sss", $email, $hashed_password, $role);

if ($stmt->execute()) {
    $user_id = $stmt->insert_id;

    // If volunteer, insert into volunteer_info table
    if ($role === 'volunteer') {
        $v_stmt = $conn->prepare("INSERT INTO volunteer_info (user_id, full_name, occupation, mobile) VALUES (?, ?, ?, ?)");
        $v_stmt->bind_param("isss", $user_id, $full_name, $occupation, $volunteer_mobile);
        $v_stmt->execute();
    }

    // If donor or recipient, insert into donor_recipient_info table
    if ($role === 'donor' || $role === 'recipient') {
        $dr_stmt = $conn->prepare("INSERT INTO donor_recipient_info (user_id, organisation_name, location, address, mobile) VALUES (?, ?, ?, ?, ?)");
        $dr_stmt->bind_param("issss", $user_id, $organisation_name, $location, $address, $mobile);
        $dr_stmt->execute();
    }

    // Redirect to login page after successful registration
    echo "<script>alert('Registration successful! Please log in.'); window.location.href='login.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
