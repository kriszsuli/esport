<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esport_reg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $game = $_POST['game'];
    $team = $_POST['team'];
    
    if ($class !== "7" && $class !== "8") {
        echo "<script>alert('Csak 7. és 8. osztályosok jelentkezhetnek!'); window.location.href='index.html';</script>";
        exit();
    }
    
    $stmt = $conn->prepare("INSERT INTO registrations (fullname, class, email, game, team) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $fullname, $class, $email, $game, $team);
    $stmt->execute();
    $stmt->close();
    
    echo "<script>document.getElementById('feedbackMessage').innerHTML = 'Sikeres regisztráció!';</script>";
    echo "<script>document.getElementById('feedbackMessage').style.color = 'green';</script>";
}
$conn->close();
?>