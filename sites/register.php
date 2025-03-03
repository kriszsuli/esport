<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esport";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

$fullname = $_POST['fullname'];
$class = $_POST['class'];
$email = $_POST['email'];
$game = $_POST['game'];
$team = $_POST['team'];

$sql = "INSERT INTO teams (fullname, class, email, game, team)
VALUES ('$fullname', '$class', '$email', '$game', '$team')";

if ($conn->query($sql) === TRUE) {
    echo "Sikeres regisztráció!";
} else {
    echo "Hiba: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: ../fooldal.html");
 
exit;
?>