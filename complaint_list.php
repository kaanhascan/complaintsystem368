<!DOCTYPE html>
<html lang="">
<head>
    <title>Complaints List</title>
</head>
<body>
<h2>Complaints List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>E-Mail</th>
        <th>Subject</th>
        <th>Text</th>
        <th>Date</th>
    </tr>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "complaint_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Error: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM complaints";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["subject"] . "</td>
                    <td>" . $row["text"] . "</td>
                    <td>" . $row["curdate"] . "</td>
                   </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>There are no complaints.</td></tr>";
    }

    $conn->close();
    ?>
</table>
</body>
</html>
