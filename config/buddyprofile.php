<?php
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
       $username = $_REQUEST["username"];
       $companyID = $_REQUEST["c_ID"];
       $firstName = $_REQUEST["first_name"]; // Ensure input fields have proper `name` attributes
       $lastName = $_REQUEST["last_name"];
   
       try {
           // Include the database connection
           require_once "dbh.inc.php";
   
           // Check if the username exists in the database
           $query = "SELECT username FROM user WHERE username = :username";
           $stmt = $pdo->prepare($query);
           $stmt->bindParam(':username', $username);
           $stmt->execute();
   
           if ($stmt->rowCount() > 0) {
               // Username exists, proceed to process the form data
               echo "Username exists. Proceeding...";
               // Optionally, you can add user details or perform additional actions here
               header("Location: success.php"); // Redirect to a success page
               die();
           } else {
               // Username does not exist
               echo "Error: Username does not exist in the database. Please enter a valid username.";
           }
       } catch (PDOException $e) {
           die("Query failed: " . $e->getMessage());
       } finally {
           $stmt = null;
           $pdo = null;
       }
   } else {
       // If the form was not submitted properly, redirect
       header("Location: buddyprofile.php");
       die();
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
        <form name="buddyprofile" method="post" action="buddyprofile.php" class="buddy_form">
            <p>Please choose a unique username...</p>
            <input type="text" placeholder="Username" name="username" required>
            <p>...and enter your real name!</p>
            <input type="text" placeholder="First name" name="first_name" required>
            <input type="text" placeholder="Last name" name="last_name" required>
            <p> Please submit your Company's ID.</p>
            <input type="text" placeholder="Company ID" name="c_ID" required>
            <input type="submit" value="submit">
            <input type="reset" value="reset">
            <p>Already have a Buddy Profile?</p>
            <a href="login.php">Log In</a>
        </form>
        </div>
        <?php
            
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