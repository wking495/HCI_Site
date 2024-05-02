<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    // Redirect to login page or display an error message
    header("Location: login.php");
    exit();
}

// Include the database connection file
include 'connection.php';

// Check if the delete button is clicked
if (isset($_POST['delete_account'])) {
    // Get the username from the session
    $user_name = $_SESSION['user_name'];

    // SQL to delete user account
    $delete_sql = "DELETE FROM users WHERE user_name='$user_name'";
    if ($connection->query($delete_sql) === TRUE) {
        echo "Account deleted successfully";
        // Redirect to index.html after successful deletion
        header("Location: index.html");
        exit();
    } else {
        echo "Error deleting account: " . $connection->error;
    }
}

$connection->close();
?>
