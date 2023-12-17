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
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
    <h2>Serene Support About Us</h2>
</div>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="aboutus.php">About Us</a>
    <a href="profile.php">Profile</a>
    <a href="index.php" style="float:right; color: red;">Back</a>
</div>

<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>


        <p>"At Serene Support, we are dedicated to providing a calming and reliable space for individuals seeking assistance and guidance. Our mission is to offer a supportive environment where everyone feels heard and valued. With a team of compassionate professionals, we strive to deliver personalized solutions tailored to each individual's needs. Whether it's lending an empathetic ear or offering practical advice, our goal is to foster a sense of tranquility and support as we navigate life's challenges together."</p>

</div>

</body>
</html>
