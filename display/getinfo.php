<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST["username"];
    $key = $_REQUEST["key"];

    if (empty($username) || empty($key)) {
        die("Both username and key are required.");
    }

    try {
        require_once "../config/dbh.inc.php";
        $query = "SELECT $key FROM user WHERE username = :username;";  // LIMIT 1?
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            die("Invalid username.");
        }

        $result = $stmt->fetch();  // PDO::FETCH_ASSOC?

        if (!isset($result[$key])) {
            die("The requested value does not exist for this user.");
        }

        echo $result[$key];

        $pdo = null;
        $stmt = null;

        // header("Location: login.php"); REMOVE?

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    die("Invalid request method.");
}
    

    // htmlspecialchars($username); for output