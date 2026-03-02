<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <main>
        <section class='left'>
            <img src="obraz.jpg" alt="foksterier">
        </section>
        <section class='right_one'>
            <h2>Zapisz się</h2>
            <form action="" method="post">
                login: <input type="text" name="login" id=""><br>
                hasło: <input type="password" name="haslo_1" id=""><br>
                powtórz hasło: <input type="password" name="haslo_2" id=""><br>
                <button>Zapisz</button>
            </form>
        </section>
        <section class='right_two'>
            <h2>Zapraszamy wszystkich</h2>
            <ol>
                <li>właścicieli psów</li>
                <li>weterynarzy</li>
                <li>tych, co chcą kupić psa</li>
                <li>tych, co lubią psy</li>
            </ol>
        </section>
    </main>
    <footer>
        Stronę wykonał: 000000000
    </footer>
    <?php
    $db = mysqli_connect('db', 'root', '', 'psy');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['login']) || empty($_POST['haslo_1']) || empty($_POST['haslo_2'])){ ?>
            <p>Wypełnij wszysktie pola</p> <?php  exit(); } ?>
        <?php
        if($_POST['haslo_1'] !== $_POST['haslo_2']){
            echo "<p> hasła nie są takie same, konto nie zostało dodane </p>";
            exit();
        }
        $login = $_POST['login'];
        $sql = "SELECT 1 from uzytkownicy where login = '$login'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);
        if($row[0] == 1){
            echo "<p> login występuje w bazie danych, konto nie zostało dodane </p>";
            exit();
        }
        $haslo = $_POST['haslo_1'];
        $haslo_zahashowane = sha1($haslo);
        $sql1 = "INSERT INTO uzytkownicy (uzytkownicy.login, uzytkownicy.haslo) SELECT '$login', '$haslo_zahashowane'";
        if(mysqli_query($db, $sql1)){
            echo "<p> Konto zostało dodane </p>";
        };

        ?>
    <?php }
    ?>
</body>
</html>