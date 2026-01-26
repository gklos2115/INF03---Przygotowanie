<?php
session_start();
if (isset($_SESSION['zalogowany'])) {
    header('Location: dashboard.php');
    exit();
}
$db = mysqli_connect("db", "root2", "", "Dziennik");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Logowania</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-wrapper">
        <img src="logo.png" alt="Logo" class="logo">
        <h2 class="title">Logowanie</h2>
        <form action="" method="post">
            <label for="mail">E-mail:</label>
            <input type="email" id="mail" name="mail" required>

            <label for="haslo">Hasło:</label>
            <input type="password" id="haslo" name="haslo" required>

            <input type="submit" value="Zaloguj się">
            <p class="form-center">Nie masz konta? <a href="register.php">Zarejestruj się</a></p>
        </form>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mail = $_POST['mail'] ?? '';
        $haslo = $_POST['haslo'] ?? '';

        // Use prepared statement to fetch stored password for provided email
        $stmt = mysqli_prepare($db, 'SELECT id, haslo FROM Admini WHERE mail = ? LIMIT 1');
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $mail);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $admin_id, $stored_hash);
            if (mysqli_stmt_fetch($stmt)) {
                mysqli_stmt_close($stmt);
                // Support hashed passwords (password_hash) and fallback to plain comparison
                if (password_verify($haslo, $stored_hash) || $haslo === $stored_hash) {
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['login'] = $mail;
                    header('Location: dashboard.php');
                    exit();
                } else {
                    echo "<p>Nieprawidłowy login lub hasło.</p>";
                }
            } else {
                mysqli_stmt_close($stmt);
                echo "<p>Nieprawidłowy login lub hasło.</p>";
            }
        } else {
            echo "<p>Błąd serwera: nie można przygotować zapytania.</p>";
        }
    }
    ?>
</body>
</html>