<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esport_reg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS count FROM registrations";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo $row['count'];
$conn->close();
?>
