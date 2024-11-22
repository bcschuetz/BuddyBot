<?php
    $dsn = "mysql:host=192.168.109.152;dbname=buddybot";
    $dbusername = "lisa";
    $dbpassword = "lisa";

    try {
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
?>