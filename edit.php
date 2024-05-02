
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <h2>Edit Profile</h2>
    <form method="get" action="edit.php">
        <label for="firstName">First Name:</label><br>
        <input type="text" id="firstName" name="firstName" value="<?php echo isset($_GET['firstName']) ? htmlspecialchars($_GET['firstName']) : ''; ?>"><br><br>
        <label for="lastName">Last Name:</label><br>
        <input type="text" id="lastName" name="lastName" value="<?php echo isset($_GET['lastName']) ? htmlspecialchars($_GET['lastName']) : ''; ?>"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>"><br><br>
        <label for="user_name">Username:</label><br>
        <input type="text" id="user_name" name="user_name" value="<?php echo isset($_GET['user_name']) ? htmlspecialchars($_GET['user_name']) : ''; ?>"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value="<?php echo isset($_GET['password']) ? htmlspecialchars($_GET['password']) : ''; ?>"><br><br>
        <label for="profile_picture">Profile Picture:</label><br>
        <input type="text" id="profile_picture" name="profile_picture" value="<?php echo isset($_GET['profile_picture']) ? htmlspecialchars($_GET['profile_picture']) : ''; ?>"><br><br>
        <input type="submit" value="Save Changes">
    </form>
</body>
</html>

<?php
session_start();

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Include database connection
include_once "connection.php";

// Fetch user's current information from the database
$username = $_SESSION['user_name'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Sanitize user input to prevent SQL injection
    $newFirstName = mysqli_real_escape_string($conn, $_GET['firstName']);
    $newLastName = mysqli_real_escape_string($conn, $_GET['lastName']);
    $newEmail = mysqli_real_escape_string($conn, $_GET['email']);
    $newUserName = mysqli_real_escape_string($conn, $_GET['user_name']);
    $newPassword = mysqli_real_escape_string($conn, $_GET['password']);
    $newProfilePicture = mysqli_real_escape_string($conn, $_GET['profile_picture']);

    // Update user's information in the database
    $updateQuery = "UPDATE users SET firstName=?, lastName=?, email=?, user_name=?, password=?, profile_picture=? WHERE user_name=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sssssss", $newFirstName, $newLastName, $newEmail, $newUserName, $newPassword, $newProfilePicture, $username);
    $stmt->execute();

    // Redirect to profile page
    header("Location: profile.php");
    exit();
}
?>