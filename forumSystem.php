<body>
<p><a href="index.htm">back to main page</a>&#128512;&#128151;&#128525;</p>
<link rel="stylesheet" type="text/css" href="WebAIstyle.css">
        <?php
        echo '<p style="color: red; font-size: 50px;text-align: center">
        Welcome To Suu Chang Li Love Story!
        </p>';
        ?>
        <div>
            <img src="https://media.tenor.com/eNWtZAs0o4gAAAAM/pig.gif" alt="myPic" />
        </div>
    </body>
<?php
// Start the session
session_start();

// Connect to the database
$servername = "localhost";
$username = "junglin";
$password = "junglin0916";
$dbname = "forumSystem";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

// Check if the user is already logged in
if (isset($_SESSION["username"])) {
$user = $_SESSION["username"];
} else {
$user = "";
}

// Login function
if (isset($_POST["login"])) {
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
$_SESSION["username"] = $username;
$user = $username;
} else {
echo "Invalid login credentials";
}
}

// Logout function
if (isset($_POST["logout"])) {
session_unset();
session_destroy();
$user = "";
}

// Post message function
if (isset($_POST["post_message"])) {
$message = mysqli_real_escape_string($conn, $_POST["message"]);


$sql = "INSERT INTO messages (username, message) VALUES ('$user', '$message')";
mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Forum System</title>
</head>
<body>

<?php if ($user == "") { ?>

<!-- Login form -->
<h2>Login</h2>
<form method="post">
<label>Username:</label>
<input type="text" name="username"><br><br>
<label>Password:</label>
<input type="password" name="password"><br><br>
<input type="submit" name="login" value="Login">
</form>

<?php } else { ?>

<!-- Logout button -->
<form method="post">
<input type="submit" name="logout" value="Logout">
</form>

<!-- Post message form -->
<h2>Post a Message</h2>
<form method="post">
<label>Message:</label>
<textarea name="message"></textarea><br><br>
<input type="submit" name="post_message" value="Post Message">
</form>

<!-- Message board -->
<h2>Message Board</h2>
<?php
$sql = "SELECT * FROM messages";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
echo "<p><strong>" . $row["username"] . ":</strong> " . $row["message"] ."~~</strong> ". $row["datetime"] ."</p>";
}
?>

<?php } ?>

</body>
</html>