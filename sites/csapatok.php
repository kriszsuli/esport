<?php

// CREATE TABLE teams (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     fullname VARCHAR(255) NOT NULL,
//     class VARCHAR(10) NOT NULL,
//     email VARCHAR(255) NOT NULL,
//     game VARCHAR(255) NOT NULL,
//     team VARCHAR(255) NOT NULL
// );

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esport";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

$sql = "SELECT team, game FROM teams";
$result = $conn->query($sql);

$teams = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $teams[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Csapatok - Pollák E-Sport 2025</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styler.css">
</head>
<body>
    <nav id="navbar">
        <div class="logo">P<span class="white">E</span></div>
        <div class="hamburger" onclick="toggleMenu()">
            &#9776;
        </div>
        <div class="nav-links" id="navLinks">
            <a href="../fooldal.html">Főoldal</a>
            <a href="csapatok.php">Csapatok</a>
            <a href="games.html">Játékok</a>
            <a href="contact.html">Kapcsolat</a>
        </div>
    </nav>

    <section class="teams-hero">
        <div class="hero-text">
            <span class="pollak">CSAPATOK</span><br>
            <span class="ev">2025</span> <br>
        </div>
    </section>

    <div class="separator"></div>

    <section class="teams-section">
        <h2>Csapatok</h2>
        <div class="teams-container">
            <?php if (!empty($teams)): ?>
                <?php foreach ($teams as $team): ?>
                    <div class="team-card">
                        <h3><?php echo htmlspecialchars($team['team']); ?></h3>
                        <p>Játék: <?php echo htmlspecialchars($team['game']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nincsenek regisztrált csapatok.</p>
            <?php endif; ?>
        </div>
    </section>

    <footer>
        <img src="../assets/pollak.svg" alt="pollak logo">
        <p>&copy; 2025 Pollák E-Sport Bajnokság</p>
        <a href="https://pollak.hu/">www.pollak.hu</a>
    </footer>

    <script src="ham.js"></script>
</body>
</html>