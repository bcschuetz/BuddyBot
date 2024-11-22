<?php
    error_reporting(0);
    $cookie_name = "user";
    $cookie_value = $_REQUEST["username"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Buddy Profile</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/x-icon" href="Bilder/logo_buddy.png">
    </head>
    <body>
        <header class="top_header">
            <a href="index.html" target="_self" title="Back to the main page">
                <img src="Bilder/logo_buddy.png" width="100px"> <!--Logo-->
            </a>
            <div class="header_item"><a href="buddyprofile.php" target="_blank">Create Buddy Profile</a></div>
            <div class="header_item"><a href="login.php">Log In</a></div>
        </header>
        <section class="section4">
            <h1>Create your own Buddy Profile</h1>
        </section>
        <div class="main_bp">
            <form name="buddyprofile" method="post" action="buddyprofile.php" class="buddy_form">
                <p>Please select a unique username</p>
                <input type="text" placeholder="Username" name="username">
                <p>.. and your real name!</p>
                <input type="text" placeholder="First name">
                <input type="text" placeholder="Last name">
                <p> Please put in your Company's ID </p>
                <input type="text" placeholder="Company ID" name="c_ID">
                <input type="submit" value="submit"><input type="reset" value="reset">
                <p>Already own a Buddy Profile?</p>
                <a href="login.php">Log In</a>
            </form>
        </div>
        <?php
            if(!isset($_COOKIE[$cookie_name])) {
                echo "ERROR: Please type in your username.";
            } else {
                echo "Your username is: '" . $_COOKIE[$cookie_name] . "'!<br>";
            }
        ?>
        <footer>
            <div><a href="#">About us</a></div>
            <div><a href="#">Products/Services</a></div>
            <div><a href="#">Help & Support</a></div>
            <div><a href="#">Legal Information</a></div>
            <div><a href="#">Community</a></div>
            <div><a href="#">Contact Information</a></div>
            <div><a href="#">Acknowledgments</a></div>
        </footer>
        
    </body>
</html>