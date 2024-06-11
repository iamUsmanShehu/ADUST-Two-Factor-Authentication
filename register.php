<?php

// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_factor_authen";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$first_name = $_POST['first_name'];
$surname = $_POST['surname'];
$other_name = $_POST['other_name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// $phone = '+234' . substr($phone, 1);

// Validate password and confirm password
if ($password != $confirm_password) {
    die("Error: Passwords do not match");
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert data into database
$sql = "INSERT INTO students (first_name, surname, other_name, gender, email, phone, password) 
        VALUES ('$first_name', '$surname', '$other_name', '$gender', '$email', '$phone', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("refresh:2; url='login.php'");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
