<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_REQUEST["username"];
    $companyID = $_REQUEST["c_ID"];
    $firstName = $_REQUEST["first_name"];
    $lastName = $_REQUEST["last_name"];

    try {
        // Include the database connection
        require_once "dbh.inc.php";

        // Check if the username already exists
        $query = "SELECT username FROM user WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Username already exists
            echo "<p style='color: red;'>Error: Username already exists. Please choose a different one.</p>";
        } else {
            // Username does not exist, create a new profile
            $insertQuery = "INSERT INTO user (username, first_name, last_name, c_ID) VALUES (:username, :first_name, :last_name, :c_ID)";
            $insertStmt = $pdo->prepare($insertQuery);
            $insertStmt->bindParam(':username', $username);
            $insertStmt->bindParam(':first_name', $firstName);
            $insertStmt->bindParam(':last_name', $lastName);
            $insertStmt->bindParam(':c_ID', $companyID);
            $insertStmt->execute();

            echo "<p style='color: green;'>Profile created successfully!</p>";
            header("Location: login.php");
            exit();
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
        <form name="buddyprofile" method="post" action="formhandler.inc.php" class="buddy_form">
            <p>Please choose a unique username...</p>
            <input type="text" placeholder="Username" name="username" required>

            <p>...and enter your real name!</p>
            <input type="text" placeholder="First name" name="first_name" required>
            <input type="text" placeholder="Last name" name="last_name" required>

            <p> Please enter your birthday </p>
            <input type="date" name="birthday" required>

            <p> Please submit your Company's ID </p>
            <input type="text" placeholder="Company ID" name="c_ID" required>

            <input type="submit" value="submit">
            <input type="reset" value="reset">
            <p>Already have a Buddy Profile?</p>
            <a href="login.php">Log In</a>
        </form>
        </div>
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