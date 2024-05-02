<?php
require_once("connection.php");

// Get form data
$firstName = $_GET["firstName"];
$lastName = $_GET["lastName"];
$email = $_GET["email"];
$user_name = $_GET["user_name"];
$password = $_GET["password"];

// Prepare SQL query
$query = "INSERT INTO users (firstName, lastName, email, user_name, password, creation) ";
$query .= "VALUES (?, ?, ?, ?, ?, NOW())";

// Prepare statement
$stmt = mysqli_prepare($connection, $query);

if ($stmt) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $user_name, $password);

    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        // Success message using JavaScript alert
        echo "<script>alert('Sign-up successful!');</script>";
        // Redirect to index page after sign-up
        echo "<script>window.location.href = 'index.html';</script>";
    } else {
        // Error message using JavaScript alert
        echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    // Error message using JavaScript alert
    echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
}

// Close connection
mysqli_close($connection);
?>
