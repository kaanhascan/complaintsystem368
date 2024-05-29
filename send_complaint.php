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
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['text'])) {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $subject = $conn->real_escape_string($_POST['subject']);
        $text = $conn->real_escape_string($_POST['text']);

        $sql = "INSERT INTO complaints (name, email, subject, text) VALUES ('$name', '$email', '$subject', '$text')";

        if ($conn->query($sql) === TRUE) {
            echo "Your complaint has been successfully sent!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "All fields are required!";
    }
} else {
    echo "Invalid request method!";
}
?>