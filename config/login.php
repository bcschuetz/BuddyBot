<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Retrieve form data
        $username = $_REQUEST["username"];
        $companyID = $_REQUEST["c_ID"];

        try {
            // Include the database connection
            require_once "dbh.inc.php";

            // Check if the username exists in the database
            $query = "SELECT username FROM user WHERE username = :username AND c_ID = :c_ID";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':c_ID', $companyID);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Username exists, login successful
                echo "Login successful! Welcome, $username.";
                header("Location: thanks.html"); // Redirect to a dashboard or another page
                exit();
            } else {
                // Username does not exist
                echo "<p style='color: red;'>Error: Invalid username or company ID. Please try again.</p>";
            }
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }
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
            <input type="text" placeholder="Username" name="username" required>
            <p>... and your company ID! </p>
            <input type="text" placeholder="Company ID" name="c_ID" required>
            <input type="submit" value="submit">
            <input type="reset" value="reset">
            <p>Don't own a Buddy Profile?</p>
            <a href="buddyprofile.php">Create Buddy Profile</a>
        </form>
        </div>
        <br><br><br>
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