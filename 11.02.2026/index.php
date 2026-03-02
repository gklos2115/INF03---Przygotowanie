<?php
session_start();

$db = mysqli_connect('db', 'root', '', 'lesson');
?>

<script>
function loguj() {
    var login = prompt("Podaj login:");
    var haslo = prompt("Podaj haslo:");

    window.location = "?login=" + login + "&haslo=" + haslo;
}
</script>

<?php

if(!isset($_SESSION['zalogowany'])) {
    echo "<script>loguj()</script>";
}

if(isset($_GET['login']) && isset($_GET['haslo'])){

    $login = $_GET['login'];
    $haslo = $_GET['haslo'];

    $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$haslo'";
    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $_SESSION['zalogowany'] = $row[0];
    }
    else{
        echo "<script>loguj()</script>";
    }
}
if(isset($_SESSION['zalogowany'])){
?>
<h1>Zalogowany</h1>
<?php
}
?>
