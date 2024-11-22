<?php
    error_reporting(0);
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $username_name = "user";
    // Create connection
    $connection = mysqli_connect("localhost", "root", "", "labdays");
    //test
    /*if (!$connection) {
        echo "Keine Verbindung";
    } else {
        echo "Die Verbindung war erfolgreich";
    } */

    $username_value = $_REQUEST["username"];
    $company_name = "company_id";
    $company_value = $_REQUEST["c_ID"];
    setcookie($username_name, $username_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie($company_name, $company_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/x-icon" href="Bilder/logo_buddy.png">
    </head>
    <body>
        <header class="top_header">
            <a href="index.html" target="self" title="Back to the main page">
                <img src="Bilder/logo_buddy.png" width="100px"> <!--Logo-->
            </a>
            <div class="header_item"><a href="buddyprofile.php" target="_blank">Create Buddy Profile</a></div>
            <div class="header_item"><a href="login.php" target="_blank">Log In</a></div>
        </header>
        <section class="section4">
            <h1>Log in with existing Buddy Profile</h1>
        </section>
        <div class="main_bp">
            <form name="login" method="post" action="login.php" class="buddy_form">
                <p>Please type in your username</p>
                <input type="text" placeholder="Username" name="username">
                <p>... and your company ID! </p>
                <input type="text" placeholder="Company ID" name="c_ID">
                <input type="submit" value="submit"><input type="reset" value="reset">
                <p>Don't own a Buddy Profile?</p>
                <a href="buddyprofile.php">Create Buddy Profile</a>
            </form>
            
        </div>
        <br><br><br>
        <?php
            if(!isset($_COOKIE[$username_name])) {
                echo "ERROR: Please type in your username.";
            } else {
                echo "Your username is: '" . $_COOKIE[$username_name] . "'!<br>";
            }
            if(!isset($_COOKIE[$company_name])) {
                echo "ERROR: Please type in your company ID.";
            } else {
                echo "Your company ID is: '" . $_COOKIE[$company_name] . "'!<br>";
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