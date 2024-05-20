<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complaint_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['Name']) && isset($_POST['email']) && isset($_POST['Subject']) && isset($_POST['Text'])) {
        $name = $conn->real_escape_string($_POST['Name']);
        $email = $conn->real_escape_string($_POST['email']);
        $subject = $conn->real_escape_string($_POST['Subject']);
        $text = $conn->real_escape_string($_POST['Text']);


        $sql = "INSERT INTO complaints (name, email, subject, text) VALUES ('$name', '$email', '$subject', '$text')";


        if ($conn->query($sql) === TRUE) {
            echo "Your complaint has been successfully sent!";
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }


        $conn->close();
    }}
?>