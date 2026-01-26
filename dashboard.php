<?php
session_start();
if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}
$db = mysqli_connect("db", "root2", "", "Dziennik");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body>
    <?php
    echo "<h1>Witaj, " . htmlspecialchars($_SESSION['login']) . "!</h1>";
    ?>
    <header>
        <nav>
            <a href="#oceny">Oceny</a>
            <a href="#frekwencja">Frekwencja</a>
            <a href="#plan">Plan Lekcji</a>
            <a href="#wiadomosci">Wiadomości</a>
            <a href="#ustawienia">Ustawienia</a>
            <a href="#uwagi">Uwagi</a>
            <a href="#logout">Wyloguj się</a>
        </nav>
    </header>
</body>
</html>