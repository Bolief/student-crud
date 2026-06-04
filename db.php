<?php
$dsn = "mysql:host=localhost;dbname=student_crud";
$username = "student_user";
$password = "pa55word";

try {
    $db = new PDO($dsn, $username, $password);
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>