<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "weather_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST["location"];
    $stmt = $conn->prepare("INSERT INTO search_history (location) VALUES (?)");
    $stmt->bind_param("s", $location);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
