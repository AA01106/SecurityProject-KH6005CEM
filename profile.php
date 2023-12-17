<?php 
session_start(); 

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "serenesupport";

$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch user details from the database
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);

    if ($result) {
        $user_data = mysqli_fetch_assoc($result);
    } else {
        // Handle error if query fails
        echo "Error fetching user data: " . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
    <h2>User Profile</h2>
</div>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="aboutus.php">About Us</a>
    <a href="profile.php">Profile</a>
    <a href="index.php?logout='1'" style="float:right; color: red;">Logout</a>
</div>

<div class="content">
    <?php if (isset($_SESSION['username']) && isset($user_data)) : ?>
        <p>Username: <?php echo $user_data['username']; ?></p>
        <p>Email: <?php echo $user_data['email']; ?></p>

    <?php endif ?>

</div>


</body>
</html>
