<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST["username"] ?? null;
    $company = $_REQUEST["c_ID"] ?? null;
    $firstName = $_REQUEST["first_name"] ?? null;
    $lastName = $_REQUEST["last_name"] ?? null;
    $birthday = $_REQUEST["birthday"] ?? null;

    // Ensure all required fields are present
    if (empty($username)  || empty($company) || empty($firstName) || empty($lastName) || empty($birthday)) {
        die("All fields are required: Username, Company ID, First Name, Last Name, and Birthday.");
    }

    try {
        require_once "dbh.inc.php";

        // Insert the user data into the database, including the birthday
        $query = "INSERT INTO user (username, c_ID, U_firstname, U_lastname, birthday) VALUES (:username, :company, :first_name, :last_name, :birthday)";
        $stmt = $pdo->prepare($query);

        // Bind parameters securely
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':company', $company, PDO::PARAM_STR);
        $stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Clean up resources
        $pdo = null;
        $stmt = null;

        // Redirect to login after successful profile creation
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        if ($e->getCode() == 23000) { // Duplicate username error
            die("Error: Username already exists. Please choose another.");
        }
        die("Query failed: " . $e->getMessage());
    }
} else {
    // Redirect if the script is accessed directly without POST
    header("Location: thanks.html");
    exit();
}
// htmlspecialchars($username); for output
?>



    