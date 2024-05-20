<?php
$servername = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS complaint_system";
if ($conn->query($sql) === TRUE) {
    echo "Created<br>";
} else {
    echo "Creation Failed" . $conn->error . "<br>";
}

$conn->select_db("complaint_system");


$sql = "CREATE TABLE IF NOT EXISTS complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    text TEXT NOT NULL,
    curdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Created<br>";
} else {
    echo "Failed " . $conn->error . "<br>";
}

$conn->close();
?>