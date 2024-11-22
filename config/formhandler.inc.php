<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST["username"];
    $company = $_REQUEST["c_ID"];
    $firstName = $_REQUEST["first_name"];
    $lastName = $_REQUEST["last_name"];

    // Check if any required fields are empty
    if (empty($username) || empty($company) || empty($firstName) || empty($lastName)) {
        die("All fields are required: Username, Company ID, First Name, and Last Name.");
    }

    try {
        require_once "dbh.inc.php";

        // Insert the user data into the database, including first and last names
        $query = "INSERT INTO user (username, c_ID, U_firstname, U_lastname) VALUES (:username, :company, :first_name, :last_name)";
        $stmt = $pdo->prepare($query);

        // Bind parameters securely
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':company', $company, PDO::PARAM_STR);
        $stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $lastName, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Clean up resources
        $pdo = null;
        $stmt = null;

        // Redirect to login after successful profile creation
        header("Location: login.php");
        die();
    } catch (PDOException $e) {
        // Handle database errors
        if ($e->getCode() == 23000) { // Code 23000 is for unique constraint violation
            die("Error: Username already exists. Please choose another.");
        }
        die("Query failed: " . $e->getMessage());
    }
} else {
    // Redirect if the script is accessed directly without POST
    header("Location: thanks.html");
    die();
}
?>


    // htmlspecialchars($username); for output