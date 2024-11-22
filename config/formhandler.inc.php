<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_REQUEST["username"];
        $company = $_REQUEST["c_ID"];

        if (empty($username) || empty($company)) {
                die("Both username and company ID are required.");
            }
        try {
            require_once "dbh.inc.php";
            $query = "INSERT INTO user (username, c_ID) VALUES (:username, :company)";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':company', $company, PDO::PARAM_STR);

            $stmt->execute();
            $pdo = null;
            $stmt = null;
            
            header("Location: login.php");
            
            die();
        } catch (PDOException $e) {
            die("Query failed:" .$e->getMessage());
        }
    } else {
        header("Location: thanks.html");
    }
    

    // htmlspecialchars($username); for output