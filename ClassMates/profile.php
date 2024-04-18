<?php
session_start();
$user_name = $_SESSION['user_name'];
require_once("connection.php");

$query = "SELECT * FROM users WHERE user_name = '$user_name'";

$result = $connection->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $email = $row["email"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <script src="script.js" defer></script>
    <title>Logged In</title>
</head>

<body>
    <div id="logo-nav-div">
        <div id="logo-div">
            <a href=#><img src="Graduation.png" alt="logo"></a>
        </div>

        <div id="nav-div">
            <h1></h1>
            <nav class="nav-bar">
                <ul>
                    <li class="nav-item"><a href="index.html">Home</a></li>
                    <li class="nav-item"><a href="about.html">About</a></li>
                    <li class="nav-item"><a href="services.html">Services</a></li>
                    <li class="nav-item"><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
        <div id="accessibility">
            <div id="google_translate_element"></div>
            <label for="slider" id="slider_label">Change Textsize</label>
            <div class="slidecontainer">
                <input type="range" min="12" max="18" value="12" class="slider" id="slider" step="2">
            </div>
        </div>
    </div>

    <section>
        <h2>User Profile</h2>
        <p><strong>First Name:</strong> <?php echo $firstName; ?></p>
        <p><strong>Last Name:</strong> <?php echo $lastName; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <div>
            <form action="delete.php">
                <button type="submit">Delete Account</button>
            </form>
            <form action="edit.php">
                <button type="submit">Edit Account</button>
            </form>
    </section>
    </div>
    <footer>
        <div id="footer-div">
            <a href=#><img src="facebook.png" alt="Facebook"></a>
            <a href=#><img src="twitter.png" alt="Twitter"></a>
            <a href=#><img src="instagram.png" alt="Instagram"></a>
            <!-- Add more social media icons and their respective links as needed -->
        </div>
    </footer>


<script src="script.js"></script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
                pageLanguage: 'en'
            },
            'google_translate_element'
        );
    }
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>