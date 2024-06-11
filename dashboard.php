<?php

session_start();

// Check if user is logged in
if (!isset($_SESSION['student_id'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['first_name'] ." ". $_SESSION['surname']; ?></h2>
    <p>This is your dashboard. You are logged in!</p>
    <a href="logout.php">Logout</a>
</body>
</html>
