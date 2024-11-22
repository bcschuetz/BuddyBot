<!--div id="php-get-info" style="display: none;">
<!?php
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
} */


//lisas code für php abfragen
require "../config/dbh.inc.php";  // Include the database connection file

echo "Ausgabe";  // This will just print 'Ausgabe' to the page

// Perform the query using the correct PDO object ($pdo)
$ausg = $pdo->query("SELECT username FROM user");  // Execute the query on the database

// Fetch all the results as an associative array
$results = $ausg->fetchAll(PDO::FETCH_ASSOC);

// Print the results using print_r
print_r($results);  // This will print the array of usernames from the user table


    

// htmlspecialchars($username); for output

?>
</div>
<script src="getinfo.js"></script>