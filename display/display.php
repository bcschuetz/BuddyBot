<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buddy Bot Display</title>
    <link rel="stylesheet" href="display_style.css">
</head>

<body>
    <div id="php-get-info" style="display: none;">
        <?php
        require "dbh.inc.php";  // Include the database connection file

        echo "Ausgabe";  // This will just print 'Ausgabe' to the page

        // Perform the query using the correct PDO object ($pdo)
        $ausg = $pdo->query("SELECT username FROM user");  // Execute the query on the database

        // Fetch all the results as an associative array
        $results = $ausg->fetchAll(PDO::FETCH_ASSOC);

        // Print the results using print_r
        print_r($results);  // This will print the array of usernames from the user table
        ?>
    </div>
    <h1 id="header">Hey! I'm Buddy Bot.</h1>
    <div class="container">
        <p id="description">
            I want to help you connect with your colleagues and form friendships.
            That's why I'm showing you whose birthday it is today, which fun events you and your colleagues have planned in the near future, and fun facts about everyone who wants to share.

            Go to the next or previous slide by pressing the right or left arrow keys, and stop or start the cycle of slides by pressing space.

            If you want to create your Buddy Profile, change the information you entered or add an event, please visit http://buddybotconfig.freesite.online/.
            Have fun!
        </p>
        <img id="image" src="cat.jpeg" alt="image"></img>
    </div>
    <script src="display_script.js"></script>
</body>

</html>