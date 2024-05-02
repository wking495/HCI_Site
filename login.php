<?php
session_start();

require_once("connection.php");

$user_name = $_GET['user_name'];
$password = $_GET["password"];

$query = "SELECT * FROM users WHERE user_name = '$user_name' AND password = '$password'";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($connection));
}

if (mysqli_num_rows($result) > 0) {
    $_SESSION['user_name'] = $user_name;
    header("Location: logged_in.html");
} else {
    $_SESSION["error_message"] = "Incorrect password. Please try again.";
    header("Location: login_page.html");
}
?>